<?php 

/*
* 넘어오는 데이터가 정상인지 검사하기 위한 절차
* 실제 페이지에서는 적용 X
**/

//$_FILES에 담긴 배열 정보 구하기.
#var_dump($_FILES);

// php 내부 소스에서 html 태그 적용 - 선긋기
echo "<hr>";

/*
* 실제로 구축되는 페이지 내부.
**/

// 임시로 저장된 정보(tmp_name)
$tempFile = $_FILES['file_source']['tmp_name'];

// 파일타입 및 확장자 체크
$fileTypeExt = explode("/", $_FILES['file_source']['type']);

// 파일 타입 
$fileType = $fileTypeExt[0];

// 파일 확장자
$fileExt = $fileTypeExt[1];

// 확장자 검사
$extStatus = false;

switch($fileExt){
    case 'csv':
    case 'vnd.ms-excel':
    #case 'vnd.openxmlformats-officedocument.spreadsheetml.sheet':
        $extStatus = true;
        break;

    default:
        echo "csv파일 외에는 사용이 불가합니다."; 
        exit;
        break;
}

// csv파일 맞는지 확인
if($fileType == 'application'){
    // 허용할 확장자를 csv로 정함, 그 외에는 업로드 불가
    if($extStatus){
        // 임시 파일 옮길 디렉토리 및 파일명
        #$resFile = "./file/{$_FILES['file_source']['name']}";
        $resFile = "./file/test.csv";
        // 임시 저장된 파일을 우리가 저장할 디렉토리 및 파일명으로 옮김
        $csvUpload = move_uploaded_file($tempFile, $resFile);

        // 업로드 성공 여부 확인
        if($csvUpload == true){
            echo "파일이 정상적으로 업로드 되었습니다. <br>";
            function insert(){
                echo "oh";
                exec("python3 ./csv_in.py");
            }
            insert();
        }
        
        else{
            echo "파일 업로드에 실패하였습니다.";
        }
    }    // end if - extStatus
        // 확장자가 csv가 아닌 경우 else문 실행
    else {
        echo "파일 확장자는 csv 이어야 합니다.";
        exit;
    }
}    // end if - filetype
    // 파일 타입이 csv가 아닌 경우 
else {
    echo "csv 파일이 아닙니다.";
    exit;
}

?>