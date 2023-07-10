<?php
require_once 'connect.php';
//$GLOBALS['connection'] = $con;
switch ($_GET['action']) {
    case "xacNhan":
        $result = xacNhan();
        break;
    case "choXuLy":
        $result = choXuLy();
        break;
    case "huy":
        $result = huy();
        break;
    default:
        break;
}
function xacNhan(){
    $servername = "localhost";
    $database = "web2";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    $MaDH = $_GET['id'];
    $sql="update hoadon set TrangThai = 1 where MaHD=".''.$MaDH;
    mysqli_query($conn, $sql);
}
function choXuLy(){
    $servername = "localhost";
    $database = "web2";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    $MaDH = $_GET['id'];
    $sql="update hoadon set TrangThai = 0 where MaHD=".''.$MaDH;
    mysqli_query($conn, $sql);
}
function huy(){
    $servername = "localhost";
    $database = "web2";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    $MaDH = $_GET['id'];
    $sql="update hoadon set TrangThai = 2 where MaHD=".''.$MaDH;
    mysqli_query($conn, $sql);
}