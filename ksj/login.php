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

<?php
	include "db.php";
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>로그인</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">로그인</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="login_action.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputID" name="id" type="text" placeholder="name@example.com" />
                                                <label for="inputID">아이디</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="pw" type="password" placeholder="Password" />
                                                <label for="inputPassword">비밀번호</label>
                                            </div>
                                            
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="./password.php">비밀번호를 잊으셨나요?</a>
                                                <input class="btn btn-primary" type="submit" value="로그인">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="./register.php">아직 회원이 아니신가요?</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
