# KSJ 보안사고 분석대응 7기 프로젝트
* **수금반 8팀 (보안방역반)**
* **멘토님 : 올잇원 최진원 대표**
* **팀원 : 곽제니, 김지원, 신사율, 윤동현, 이선아, 임승연, 이종학, 이준학, 유병일**
<img src="http://kshieldjr.org/images/hrpool/logo-hrpool-hover.png" width="400" heigght="270">

<br>
<br>

**이 저장소는 다음과 같은 환경에서 동작됩니다.**

* docker 설치되어 있는 PC
* container.ps1이용 시 windows 파워셸 실행
* windows가 아닐 시 Build Setup부분 명령어 실행

## APT 초기 침투 시뮬레이션을 통한 보안인식 증진 교육


### Build Setup
```
> docker pull dlwhdgkr98/project_test:2
> docker run -it --name mail_trainer -p 3306:3306 -p 3307:21 -p 8080:8080 dlwhdgkr98/project_test:2 /bin/bash
```
cmd나 파워쉘에서 docker login 명령어를 입력하여 Docker Hub의 계정에 로그인을 합니다.
![KakaoTalk_20211117_162802885](https://user-images.githubusercontent.com/90955623/142159047-0cb980a8-3213-4e92-8985-c4aae595c926.png)

다운받은 container.ps1를 실행합니다.   
마우스 오른쪽 버튼으로 파일을 선택하고, Powershell에서 실행을 누릅니다.

![2](https://user-images.githubusercontent.com/90955623/142159331-3b7edfbb-4349-4b12-8581-238f09b24a99.png)


해당 파일을 실행하면 자동으로 이미지 파일을 실행한 컨테이너 내부로 들어가집니다.
![KakaoTalk_20211117_164933225](https://user-images.githubusercontent.com/90955623/142159938-74d096d4-ec1b-426a-8918-1c76a822ae53.png)

컨테이너 내부에서 bash set.sh 명령어를 입력해 쉘 스크립트 파일을 실행해 주세요.   
그리고 웹 서버를 구동할 PC의 공인 IP 주소나 호스트 IP 주소를 입력해 주세요.

![KakaoTalk_20211117_170319306](https://user-images.githubusercontent.com/90955623/142160022-5c6d9836-1835-4055-864d-560c5eb2b89d.png)


![KakaoTalk_20211117_165451512](https://user-images.githubusercontent.com/90955623/142160068-d04608eb-0e72-46d0-aa0a-f89a9fd30250.png)

쉘 스크립트 실행이 끝나고 웹 브라우저에서 (입력했던 IP 주소:8080/ksj)를 입력하시면 웹 서버에 들어가실 수 있습니다.
![KakaoTalk_20211117_165539343](https://user-images.githubusercontent.com/90955623/142160105-4d188a33-fcb3-431f-a99e-9e841f32b5c9.png)

미리 설정된 ID와 PW인 admin, admin을 입력하시면 로그인하실 수 있습니다.
![KakaoTalk_20211117_165542584](https://user-images.githubusercontent.com/90955623/142160132-70b73997-a142-4855-9252-a030e952d41a.png)
