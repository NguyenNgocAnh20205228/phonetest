<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Thế giới điện thoại</title>
    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          crossorigin="anonymous">
    <!-- owl carousel libraries -->
    <link rel="stylesheet" href="js/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="js/owlcarousel/owl.theme.default.min.css">
    <script src="js/Jquery/Jquery.min.js"></script>
    <script src="js/owlcarousel/owl.carousel.min.js"></script>

    <!-- Slider -->
    <link href="https://cdn.jsdelivr.net/npm/ion-rangeslider@2.3.0/css/ion.rangeSlider.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/ion-rangeslider@2.3.0/css/ion.rangeSlider.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/ion-rangeslider@2.3.0/js/ion.rangeSlider.min.js"></script>

    <!-- our files -->
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/topnav.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/taikhoan.css">
    <link rel="stylesheet" href="css/trangchu.css">
    <link rel="stylesheet" href="css/home_products.css">
    <link rel="stylesheet" href="css/pagination_phantrang.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/gioHang.css">
    <!--	 js-->
    <script src="js/classes.js"></script>
    <script src="js/dungchung.js"></script>
    <script src="js/trangchu2.js"></script>
    <script src="js/giohang.js"></script>




</head>

<body>

<?php include('php/connect.php') ?>
<section>
    <!--  Header -->
    <?php require_once ('dungchung/header.php')?>
    <div class="listDonHang">
        <table class="listSanPham">
            <tbody>
                <?php
                $sql_HD="select * from hoadon where MaND='" . $_SESSION['user']['MaND'] . "' order by NgayLap desc ";
                $result=mysqli_query($conn,$sql_HD );?>
            <?php

            while ($row=mysqli_fetch_array($result)){?>
            <tr>
                <th colspan="5">
                    <h3 style="text-align:center;"><?php echo $row['NgayLap']?></h3>
                </th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
<!--                <th>Thời gian thêm vào giỏ</th>-->
            </tr>
            <tr>
                <td><?php $i=1; echo $i++ ?></td>
                <?php  $sql_ChiTietHD="select * from chitiethoadon where MaHD =".''.$row['MaHD'];
                $result_ChiTietHD=mysqli_query($conn,$sql_ChiTietHD );
                while ($row_ChiTietHD=mysqli_fetch_array($result_ChiTietHD)){
                    $sql_SP = "select * from sanpham where MaSP =" . '' . $row_ChiTietHD['MaSP'];
                    $result_SP = mysqli_query($conn, $sql_SP);
                    $row_SP = mysqli_fetch_array($result_SP);
                }
                ?>
                <td class="noPadding imgHide">
                    <a target="_blank" href="chitietsanpham.html?Xiaomi-Redmi-5-Plus-4GB" title="Xem chi tiết">
                        <?php echo $row_SP['TenSP']?>
                        <img src="img/products/xiaomi-redmi-5-plus-600x600.jpg">
                    </a>
                </td>
                <td class="alignRight">4.790.000 ₫</td>
                <td class="soluong">
                    1
                </td>
                <td class="alignRight">4.790.000 ₫</td>
<!--                <td style="text-align: center">7/3/2023, 9:18:18 PM</td>-->
            </tr>


            <tr style="font-weight:bold; text-align:center; height: 4em;">
                <td colspan="3">TỔNG TIỀN: </td>
                <td class="alignRight">5.050.000 ₫</td>
                <td> Đang chờ xử lý </td>
            </tr>
            <?php } ?>

            </tbody>

        </table>
        <hr>
    </div>




</section> <!-- End Section -->

<!--	<script>-->
<!--		addContainTaiKhoan(); addPlc();-->
<!--	</script>-->

<!--<div class="plc">-->
<!--    <section>-->
<!--        <ul class="flexContain">-->
<!--            <li>Giao hàng hỏa tốc trong 1 giờ</li>-->
<!--            <li>Thanh toán linh hoạt: tiền mặt, visa / master, trả góp</li>-->
<!--            <li>Trải nghiệm sản phẩm tại nhà</li>-->
<!--            <li>Lỗi đổi tại nhà trong 1 ngày</li>-->
<!--            <li>Hỗ trợ suốt thời gian sử dụng.-->
<!--                <br>Hotline:-->
<!--                <a href="tel:12345678" style="color: #288ad6;">12345678</a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </section>-->
<!--</div>-->
<!---->
<!--<div class="footer">-->
    <!--<script>addFooter(); </script-->
    <!-- ============== Alert Box ============= -->
<!--    <div id="alert">-->
<!--        <span id="closebtn">&otimes;</span>-->
<!--    </div>-->
<!---->
    <!-- ============== Footer ============= -->
<!--</div>-->

<i class="fa fa-arrow-up" id="goto-top-page" onclick="gotoTop()"></i>


</body>

</html>
