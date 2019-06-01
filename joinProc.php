<?php
    /*
        사용자가 입력한 정보로 DB에 접속하여 insert 구문으로 행 삽입
    */

    $name = $_GET['name'];
    $kor = $_GET['kor'];
    $eng = $_GET['eng'];
    $math = $_GET['math'];
    $sum = $kor+$eng+$math;
    $avg = $sum/3;
    
    $Servername = "localhost";
    $db_user = "hynjng0130";
    $db_pw = "";
    $db_name = "hynjng0130";

    $connection = new mysqli($Servername, $db_user, $db_pw, $db_name);

    mysqli_query($connection, "set session character_set_connection=utf8;");
    mysqli_query($connection, "set session character_set_results=utf8;");
    mysqli_query($connection, "set session character_set_client=utf8;");
    //한글 깨짐 방지

    $sql = "
    insert into
    student (name, kor, eng, math, sum, avg)
    values ('".$name."', '".$kor."', '".$eng."', '".$math."', '".$sum."', '".$avg."');";
    $result = $connection->query($sql);

    if ( $result === true ){
        echo "<html><script>alert('등록 완료');location.href='join.php';</script></html>";
    }else{
        echo "<html><script>alert('등록 실패');location.href='join.php';</script></html>";
    }

    $connection->close();
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>등록 확인</title>
</head>

<body>
</body>

</html>
