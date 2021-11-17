<?php
	//Connect MYSQL
	//$connect = mysqli_connect('localhost', 'ksj', 'qhdks!321', 'WebProject') or die("connect fail");
	//$number = $_GET['number'];
	session_start();
    //$_SESSION['userid']="test";
	//Check SESSION
	if(isset($_SESSION['userid']))
	{
?>
		<script>
			location.replace("./home.php")
		</script>
<?php
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>계정 생성</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">계정 생성</h3></div>
                                    <div class="card-body">
                                        <form action="register_action.php" method="POST" id="register-form">
                                            <!--
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">성</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">이름</label>
                                                    </div>
                                                </div>
                                            </div>
-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="id" type="text" placeholder="name@example.com" />
                                                <label for="inputID">아이디</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="pw" type="password" placeholder="name@example.com" />
                                                <label for="inputPw">비밀번호</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">이메일</label>
                                            </div>
                                            <!--
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="pw" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">비밀번호</label>
                                                    </div>
                                                
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">비밀번호 확인</label>
                                                    </div>
                                                </div>
                                            </div>
                                            -->
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input class="btn btn-primary btn-block" type="submit" value="회원가입"></div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="./login.php">이미 계정이 있으신가요? 로그인하러 가기</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>

        <script>
            const registerForm = document.querySelector("#register-form");
            const inputPassword = document.querySelector("#inputPassword");
            const inputPasswordConfirm = document.querySelector("#inputPasswordConfirm");
            if(inputPassword.value && inputPassword.value === inputPasswordConfirm.value){
                registerForm.submit();
            }else{
                alert("비밀번호가 서로 일치하지 않습니다.");
            }
            });
            </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
