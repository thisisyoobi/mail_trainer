import sys
import time
import datetime
import pymysql
import os
from urllib import parse



while True:
    f = open('/var/log/apache2/other_vhosts_access.log' , 'r')
    fw = open('./time_logging_4_netflix.log', 'a')
    fr = open('./time_logging_4_netflix.log', 'r')

    checkPoint = 0

    for line in f.readlines()[::-1]:
        if "netflix_infected.html?name=" in line:
            # print(line)
            time_info = line.split()[4]
            print(time_info)
            data_b = fr.readlines()
            for data in data_b:
                data = data.replace('\n','')
                if data == time_info:
                    print("same")
                    checkPoint = 1
                    break
            if checkPoint == 0:
                fw.write(time_info + "\n")
                public_ip = line.split()[1]
                private_ip = "No Info"
                mac = "No Info"
                find_name = line.split("name=")[1].replace('"','')
                find_name = find_name.split()[0]
                find_name = parse.unquote(find_name)
                now = str(datetime.datetime.now())

                print("no logging data thus write info 2 DB")
                print(now + '/' + parse.quote(find_name) + '/' + public_ip + '/' + private_ip + '/' + mac)

                # DB 연결
                connect = pymysql.connect(host='localhost', user='ksj', password='qhdks!321', db='WebProject', charset='utf8')
                cur = connect.cursor()
                # DB의 infected_user_info table에 저장
                query = "insert into infected_user_info values ('" + now + "', '" + find_name + "', '" + public_ip + "', '" + private_ip + "', '" + mac + "')"
                cur.execute(query)
                connect.commit()
                connect.close()
            else:
                print("have infected but no write")


    f.close()
    fw.close()
    fr.close()

    time.sleep(60)