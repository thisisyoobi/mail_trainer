import pymysql
import csv

conn = pymysql.connect(host='localhost', user='ksj', password='qhdks!321', db='WebProject', charset='utf8')
curs = conn.cursor()
sql = "insert into import_company (name, email) values (%s, %s)"
f = open('./file/test.csv', 'r', encoding='utf-8')
rd = csv.reader(f)

for line in rd:
    #if(line[0] == "name" or line[1] == "email")
    #    continue
    curs.execute(sql, (line[0], line[1]))

conn.commit()
conn.close()
f.close()