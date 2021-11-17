import socket
import pymysql
import sys
from _thread import *
from urllib import parse

# 쓰레드에서 실행되는 코드
# 접속한 클라이언트마다 새로운 쓰레드가 생성되어 통신
def threaded(client_socket, addr):
    print('Connected by :', addr[0], ':', addr[1])

    # 클라이언트가 접속을 끊을 때 까지 반복
    while True:

        try:
            # 데이터 수신
            data = client_socket.recv(1024)

            if not data:
                print('Disconnected by ' + addr[0], ':', addr[1])
                break

            # DB 연결
            connect = pymysql.connect(host='localhost', user='ksj', password='qhdks!321', db='WebProject', charset='utf8')
            cur = connect.cursor()

            # 수신된 데이터 분리
            user_data = data.decode()
            user_data = str(user_data).split(" ")
            user_data[1] = user_data[0] + " " + user_data[1]
            del user_data[0]
            print(user_data)

            # 공인IP와 사용자 이름 매칭
            f = open('/var/log/apache2/other_vhosts_access.log' , 'r')

            check_break = True

            for line in f.readlines()[::-1]:
                if "?name=" in line:
                    list_line = line.split()
                    if list_line[1] == user_data[1]:
                        # print(line)
                        for find_name in list_line:
                            if "?name=" in find_name:
                                find_name = find_name.split("name=")[1].replace('"','')
                                find_name = parse.unquote(find_name)
                                check_break = False
                                break
                        if(check_break == False):
                            break
                    else:
                        find_name = "No Name"

            # DB의 infected_user_info table에 저장
            query = "insert into infected_user_info values ('" + user_data[0] + "', '" + find_name + "', '" + user_data[1] + "', '" + user_data[2] + "', '" + user_data[3] + "')"
            cur.execute(query)
            connect.commit()


        except ConnectionResetError as e:

            print('Disconnected by ' + addr[0], ':', addr[1])
            break

    client_socket.close()

# 서버 정보 setting
HOST = '0.0.0.0'
PORT = 21

server_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
server_socket.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
server_socket.bind((HOST, PORT))
server_socket.listen()

print('server start')

# 클라이언트가 접속하면 accept 함수에서 새로운 소켓 리턴
# 새로운 쓰레드에서 해당 소켓을 사용하여 통신
while True:
    print('wait')

    client_socket, addr = server_socket.accept()
    start_new_thread(threaded, (client_socket, addr))

server_socket.close()