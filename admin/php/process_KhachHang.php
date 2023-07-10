<?php
$servername = "localhost";
$database = "web2";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
$MaND = $_GET['id'];
$sql="select * from nguoidung where MaND=".''.$MaND ;
$row=mysqli_fetch_array(mysqli_query($conn,$sql));
echo $row['TrangThai'];
if ($row['TrangThai']==1){
    $sql_trangThai="update nguoidung set TrangThai = 0 where MaND=".''.$MaND;
    mysqli_query($conn, $sql_trangThai);
    echo $sql_trangThai;

}else{
    $sql_trangThai="update nguoidung set TrangThai = 1 where MaND=".''.$MaND;
    mysqli_query($conn, $sql_trangThai);
    echo $sql_trangThai;
}
