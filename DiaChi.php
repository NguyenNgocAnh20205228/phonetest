<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style3.css">

    <!--boostrap-->
    <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <!-- ================================================================================================== -->
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
    />
    <!-- ================================================================================================== -->
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />

    <!-- ================================================================================================== -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="css/delivery.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/topnav.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/taikhoan.css">
    <link rel="stylesheet" href="css/trangchu.css">
    <link rel="stylesheet" href="css/home_products.css">
    <link rel="stylesheet" href="css/pagination_phantrang.css">
    <link rel="stylesheet" href="css/footer.css">




</head>
<body >
<?php
include('php/connect.php');
if (!isset($_SESSION['address'])) {
    $_SESSION['address'] = [];
    $_SESSION['address']['1']= '';
    $_SESSION['address']['2']= '';
    $_SESSION['address']['3']='';
    $_SESSION['address']['4'] = '';
    $_SESSION['address']['5'] = '';
}

?>
<section style="min-height: 85vh">
    <div class="header group">
        <div class="logo">
            <a href="index.php">
                <img src="img/logo.png" alt="Trang chủ Smartphone Store" title="Trang chủ Smartphone Store">
            </a>
        </div> <!-- End Logo -->

        <div class="content">
            <div class="search-header" style="position: relative; left: 162px; top: 1px;">
                <form class="input-search" method="get" action="index.php">
                    <div class="autocomplete">
                        <input id="search-box" name="search" autocomplete="off" type="text" placeholder="Nhập từ khóa tìm kiếm...">
                        <button type="submit">
                            <i class="fa fa-search"></i>
                            Tìm kiếm
                        </button>
                    </div>
                </form> <!-- End Form search -->
                <div class="tags">
                    <strong>Từ khóa: </strong>
                </div>
            </div> <!-- End Search header -->

            <div class="tools-member">
                <div class="member">
                    <a onclick="checkTaiKhoan()">
                        <i class="fa fa-user"></i>
                        Tài khoản
                    </a>
                    <div class="menuMember hide">
                        <a href="nguoidung.html">Trang người dùng</a>
                        <a onclick="if(window.confirm('Xác nhận đăng xuất ?')) logOut();">Đăng xuất</a>
                    </div>

                </div> <!-- End Member -->

                <div class="cart">
                    <a href="giohang.php">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Giỏ hàng</span>
                        <span class="cart-number"></span>
                    </a>
                </div> <!-- End Cart -->

                <!--<div class="check-order">
                    <a>
                        <i class="fa fa-truck"></i>
                        <span>Đơn hàng</span>
                    </a>
                </div> -->
            </div><!-- End Tools Member -->
        </div> <!-- End Content -->
    </div> <!-- End Header -->

<!-- -------------delivery icon------ -->
<section class="delivery">
    <div class="container">
        <div class="delivery-top-wrap">
            <div class="delivery-top">
                <div class="delivery-top-delivery delivery-top-item" >
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="delivery-top-adress delivery-top-item" >
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="delivery-top-payment delivery-top-item" >
                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- -------------Delivery------ -->
    <div class="container">
        <div class="delivery-content row">
            <div class="delivery-content-left">
                <form name="form-diachi"  id="form-diachi" onsubmit="getDiaChi(); return false;" method="post">
                    <p>Vui lòng chọn địa chỉ giao hàng </p>
                    <div class="delivery-content-left-input-top row" >
                        <div class="delivery-content-left-input-top-item">
                            <label  for="">Họ<span style="color:red;"></span></label>
                            <input type="text" id="Ho" name="Ho" value="" required oninvalid="this.setCustomValidity('Hãy nhập họ!')" onchange="this.setCustomValidity('')" type="text">
                        </div>
                        <div class="delivery-content-left-input-top-item">
                            <label  for="">Tên<span style="color:red;"></span></label>
                            <input type="text" id="Ten" name="Ten" value="" required oninvalid="this.setCustomValidity('Hãy nhập tên!')" onchange="this.setCustomValidity('')" type="text">
                        </div>
                        <div class="delivery-content-left-input-top-item">
                            <label  for="">Điện thoại<span style="color:red;"></span></label>
                            <input type="number" name="phone_number" id="phone_number" value="" required oninvalid="this.setCustomValidity('Hãy nhập số điện thoại!')" onchange="this.setCustomValidity('')" type="number">
                        </div>
                        <div class="delivery-content-left-input-top-item">
                            <label  for="">Tỉnh/Tp<span style="color:red;"></span></label>
                            <input type="text" name="province" id="province" value="" required oninvalid="this.setCustomValidity('Hãy nhập tỉnh nhập tỉnh/thành phố!')" onchange="this.setCustomValidity('')" type="text">
                        </div>
                        <div class="delivery-content-left-input-top-item">
                            <label  for="">Quận/Huyện<span style="color:red;"></span></label>
                            <input type="text" name="district" id="district" value="" required oninvalid="this.setCustomValidity('Hãy nhập quận/huyện !')" onchange="this.setCustomValidity('')" type="text">
                        </div>
                    </div>
                    <div class="delivery-content-left-input-bottom">
                        <label  for="">Địa chỉ cụ thể<span style="color:red;"></span></label>
                        <input type="text" name="specific_address" id="specific_address" value="" required oninvalid="this.setCustomValidity('Hãy điền địa chỉ cụ thể!')" onchange="this.setCustomValidity('')" type="text">
                    </div>
                    <div class="delivery-content-left-button row">
<!--                        <a href="cart.php" style="color:cornflowerblue"><span>&#171;</span><p style="font-size: 14px;">Quay lại giỏ hàng </p></a>-->
                        <button  class="btn btn-outline-danger" type="button" onclick="location.href = 'giohang.php' "><span>&#171;</span><p style="font-size: 14px;">Quay lại giỏ hàng </p></button>
                        <button  class="btn btn-outline-success" type="submit"  onclick=" "><p style="font-weight: bold"><i class="fa fa-usd"></i> THANH TOÁN VÀ GIAO HÀNG</p></button>
                    </div>
                </form>

            </div>

            <div class="delivery-content-right">
                <table style="    font-size: 14px;">

                    <tr>
                        <th>Sản phẩm</th>
                        <th> Số lượng </th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php
                    $tong = 0;
                    if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
                    for ($i=0;$i < sizeof($_SESSION['giohang']);$i++){
                    ?>
                        <tr>
                            <td> <?php echo $_SESSION['giohang'][$i][1] ?></td>
                            <td><?php echo $_SESSION['giohang'][$i][3] ?></td>
                            <td><a><?php echo $_SESSION['giohang'][$i][2] ?><sup>đ</sup></a></td>

                        </tr>
<!--                    <tr>-->
<!--                        <td>Sam sung A12</td>-->
<!--                        <td> 2 </td>-->
<!--                        <td>9999999</td>-->
<!--                    </tr>-->
                    <?php  }
                    }
                    ?>

                    <tr>
                        <td style="font-weight: bold" colspan="2">Tổng</td>
                        <td style="font-weight: bold"><a><?php echo $_SESSION['tong'] ?><sup>đ</sup></a></td>
                    </tr>

                </table>

            </div>
        </div>
    </div>

    </section>
</section>

<!-- -------------footer------ -->
<!-- -------------footer------ -->
<div class="plc">
    <section>
        <ul class="flexContain">
            <li>Giao hàng hỏa tốc trong 1 giờ</li>
            <li>Thanh toán linh hoạt: tiền mặt, visa / master, trả góp</li>
            <li>Trải nghiệm sản phẩm tại nhà</li>
            <li>Lỗi đổi tại nhà trong 1 ngày</li>
            <li>Hỗ trợ suốt thời gian sử dụng.
                <br>Hotline:
                <a href="tel:12345678" style="color: #288ad6;">12345678</a>
            </li>
        </ul>
    </section>
</div>

<div class="footer">
    <!--<script>addFooter(); </script-->
    <!-- ============== Alert Box ============= -->
    <div id="alert">
        <span id="closebtn">&otimes;</span>
    </div>
</div>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="js/thanhtoan.js"></script>
<script src="js/Jquery/Jquery.min.js"></script>
<script src="js/owlcarousel/owl.carousel.min.js"></script>
</body>
</html>