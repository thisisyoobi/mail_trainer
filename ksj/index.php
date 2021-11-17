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
        <title>홈페이지</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">홈페이지</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><a class="btn btn-primary btn-block" href="./login.php">로그인</a></div>
                                                <br><br>
                                                <div class="d-grid"><a class="btn btn-primary btn-block" href="./register.php">회원가입</a></div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
    </body>
</html>
