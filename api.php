<?php
    header('Access-Control-Allow-Origin: *');
    $s="localhost";
    $u="root";
    $p="";
    $db="flu2";
    $conn=new mysqli($s,$u,$p,$db);
    $sql="select * from mytable";
    $kq=$conn->query($sql);
    while ($row[]=$kq->fetch_assoc()) {
        $json = json_encode($row);
    }
    echo '{"product":' . $json . '}';
    $conn->close();
?>