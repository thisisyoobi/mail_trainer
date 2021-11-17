import sys
from urllib import parse

f = open('/var/log/apache2/other_vhosts_access.log' , 'r')

check_break = True
data = []

for line in f.readlines()[::-1]:
    if "netflix_login_page.html?name=" in line:
        #print(line)
        ip_info = line.split()[1]
        find_name = line.split("name=")[1].replace('"','')
        find_name = find_name.split()[0]
        data_list = []
        data_list.append(ip_info)
        data_list.append(find_name)
        data.append(data_list)

print(data)

f.close()

f = open('/var/log/apache2/other_vhosts_access.log' , 'r')

for line in f.readlines()[::-1]:
    if "netflix_infected.html" in line:
        list_line = line.split()