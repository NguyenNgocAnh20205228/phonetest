<?php
//session_start();
include 'connect.php';
//$GLOBALS['connection'] = $con;
switch ($_GET['action']) {
    case "update":
        $result = update_cart();
        echo json_encode($result);
        break;
    case "tangsoluong":
        $result = tangsoluong();
        echo json_encode($result);
        break;
    case "giamsoluong":
        $result = giamsoluong();
        echo json_encode($result);
        break;
    default:
        break;
}
function update_cart($add = false)
{
    $changeQuantity = false;
    foreach ($_POST['quantity'] as $id => $quantity) {
        if ($quantity == 0) {
            unset($_SESSION["giohang"][$id][3]);
        } else {
            if (!isset($_SESSION["cart"][$id][3])) {
                $_SESSION["giohang"][$id][3] = 0;
            }
            if ($add) {
                $_SESSION["giohang"][$id][3] += $quantity;
            } else {
                $_SESSION["giohang"][$id][3] = $quantity;
            }
            //Kiểm tra số lượng sản phẩm tồn kho
//            $addProduct = mysqli_query($GLOBALS['connection'], "SELECT `SoLuong` FROM `sanpham` WHERE `id` = " . $id);
//            $addProduct = mysqli_fetch_assoc($addProduct);
//            if ($_SESSION["giohang"][$id] > $addProduct['quantity']) {
//                $_SESSION["giohang"][$id] = $addProduct['quantity'];
//                if ($add) {
//                    return array(
//                        'status' => 0,
//                        'message' => "Số lượng sản phẩm tồn kho chỉ còn: " . $addProduct['quantity'] . " sản phẩm. Bạn vui lòng kiểm tra lại giỏ hàng."
//                    );
//                } else {
//                    $changeQuantity = true;
//                }
//            }
            if ($add) {
                return array(
                    'status' => 1,
                    'message' => "Thêm sản phẩm thành công"
                );
            }
        }
    }
}

function tangsoluong(){
    $id=$_GET['id'];
        $_SESSION['giohang'][$id][3] = $_SESSION['giohang'][$id][3] + 1;

}
function giamsoluong(){
        $id=$_GET['id'];
        if ($_SESSION['giohang'][$id][3] == 1) {
            unset($_SESSION["giohang"][$id]);
        } else {
            $_SESSION['giohang'][$id][3] = $_SESSION['giohang'][$id][3] - 1;
        };
}