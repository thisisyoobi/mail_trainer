<!DOCTYPE html>

<?php
	//Connect MYSQL
	//$connect = mysqli_connect('localhost', 'ksj', 'qhdks!321', 'WebProject') or die("connect fail");
	//$number = $_GET['number'];
	session_start();
    //$_SESSION['userid']="test";
	//Check SESSION
	if(!isset($_SESSION['userid']))
	{
?>
		<script>
			alert("Login First!");
			location.replace("./login.php")
		</script>
<?php
		exit;
	}
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>훈련실시</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <!--새로 추가-->
        <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="./home.php">보안방역반</a>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">설정</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="./logout.php">로그아웃</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!--왼쪽 나비 메뉴-->
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="./infocon.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                훈련실시
                            </a>
                            <a class="nav-link" href="./infected_table.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                감염자 현황
                            </a>
                            <!--
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                신고결과
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                대상관리
                            </a>
-->
                            <div class="sb-sidenav-menu-heading">기타</div>
                            <a class="nav-link" href="index.html">
                                문의
                            </a>

                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">훈련실시</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">이름과 이메일 입력</li>
                        </ol>

                        
                        <button class="btn btn-primary" id="btnFileInput" type="button" ><i class="fas fa-search"></i> 파일로 입력</button>
                        <button class="btn btn-primary" id="btnAllDelete" type="button style="float: center"><i class="fas fa-user-slash"></i> 전체 삭제</button>
                        <button class="btn btn-primary" id="btnFileInput" type="button" style="float: right;"><i class="far fa-paper-plane"></i> 메일 발송</button>
                        <br><br>
                        <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            훈련 대상
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>이름</th>
                                        <th>이메일</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $jb_conn = mysqli_connect( 'localhost', 'ksj', 'qhdks!321', 'WebProject' );
                                    $jb_sql = "SELECT * FROM import_company LIMIT 5;";
                                    $jb_result = mysqli_query( $jb_conn, $jb_sql );
                                    while( $jb_row = mysqli_fetch_array( $jb_result ) ) {
                                        echo '<tr><td>' . $jb_row[ 'no' ] . '</td><td>'. $jb_row[ 'name' ] . '</td><td>' . $jb_row[ 'email' ] . '</td></tr>';
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
