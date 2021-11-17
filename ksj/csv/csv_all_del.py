import pymysql

conn = pymysql.connect(host='localhost', user='ksj', password='qhdks!321', db='WebProject', charset='utf8')
curs = conn.cursor()
sql = "delete from import_company"

curs.execute(sql)

conn.commit()
conn.close()