<?php
    $Servername = "localhost";
    $db_user = "hynjng0130";
    $db_pw = "guswjd0130";
    $db_name = "hynjng0130";

    $connection = new mysqli($Servername, $db_user, $db_pw, $db_name);

    mysqli_query($connection, "set session character_set_connection=utf8;");
    mysqli_query($connection, "set session character_set_results=utf8;");
    mysqli_query($connection, "set session character_set_client=utf8;");
    //한글 깨짐 방지

    $sql = "SELECT * FROM student Order by num desc";
    $result = $connection->query($sql);

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>성적 처리</title>
    <style>
    table {
        border: solid pink;
        margin: auto;
    }

    th {
        border: solid pink;
        background-color: pink;
        text-align: center;
    }

    td {
        border: solid 1px skyblue;
    }

    h1 {
        text-align: center;
    }

    div {
        margin: 30px auto;
        text-align: center;
    }

    #input_area, #select_area {
        width: 600px;
        border: solid 1px gray;
    }
    </style>
    <script>
    function doSubmit() {
        var id = document.getElementById('name').value;
        var pw = document.getElementById('kor').value;
        var name = document.getElementById('eng').value;
        var phone = document.getElementById('math').value;

        if (name.length == 0) {
            alert('이름을 입력하세요.');
            document.getElementById('name').focus();
        } else if (kor.length == 0) {
            alert('국어 점수를 입력하세요.');
            document.getElementById('kor').focus();
        } else if (eng.length == 0) {
            alert('영어 점수를 입력하세요.');
            document.getElementById('eng').focus();
        } else if (math.length == 0) {
            alert('수학 점수를 입력하세요.');
            document.getElementById('math').focus();
        } else {
            document.getElementById('myform').submit();
        }
    }
    function enterkey() {
        if (window.event.keyCode == 13) {
            doSubmit();
        }
    }

    </script>

</head>

<body>
    <form action="joinProc.php" id="myform" method="get">
        <div id="input_area">
            <div>
                <h1>성적처리</h1>
            </div>
            <div>
                <table>
                    <tr>
                        <th>이름</th>
                        <td>
                            <input type="text" id="name" name="name" onkeyup="enterkey();"/>
                        </td>
                    </tr>
                    <tr>
                        <th>국어</th>
                        <td><input type="text" id="kor" name="kor" onkeyup="enterkey();"/></td>
                    </tr>
                    <tr>
                        <th>영어</th>
                        <td><input type="text" id="eng" name="eng" onkeyup="enterkey();"/></td>
                    </tr>
                    <tr>
                        <th>수학</th>
                        <td><input type="text" id="math" name="math" onkeyup="enterkey();"/></td>
                    </tr>
                </table>
            </div>
            <div>
                <button type="button" onclick="doSubmit();">입력</button>
            </div>
        </div>
        <div id="select_area">
            <div>
                <h1>등록된 학생 목록</h1>
            </div>
            <div>
                <table>
                    <tr>
                        <th>이름</th>
                        <th>국어</th>
                        <th>영어</th>
                        <th>수학</th>
                        <th>총점</th>
                        <th>평균</th>
                    </tr>
                    <tr>
                        <?php            
                            while($row = $result->fetch_assoc()){
                                echo "<tr>".
                                "<td>".$row['name']."</td>".
                                "<td>".$row['kor']."</td>".
                                "<td>".$row['eng']."</td>".
                                "<td>".$row['math']."</td>".
                                "<td>".$row['sum']."</td>".
                                "<td>".$row['avg']."</td>".
                                "</tr>";        
                            }
                            $connection->close();
                            ?>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</body>
<head>
</head>
</html>