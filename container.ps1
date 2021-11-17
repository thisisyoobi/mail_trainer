powershell -Command "docker pull dlwhdgkr98/project_test:2"
powershell -Command "docker run -it --name mail_trainer -p 3306:3306 -p 3307:21 -p 8080:8080 dlwhdgkr98/project_test:2 /bin/bash"


pause
