<?php
include "conn.php";

function query($query){
    $conn = $_SESSION['conn'];
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

?>