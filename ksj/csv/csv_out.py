import pymysql
import csv

conn = pymysql.connect(host='localhost', user='ksj', password='qhdks!321', db='WebProject', charset='utf8')
curs = conn.cursor()
sql = "select * from import_company"
f = open('./file/test2_output.csv', 'w', encoding='utf-8', newline='')
wr = csv.writer(f)
curs.execute(sql)
rows = curs.fetchall()

for row in rows:
    wr.writerow([row[0], row[1], row[2]])

conn.commit()
conn.close()
f.close()