<?php  require_once('php/connect.php') ?>
<div class="khungSanPham" style="border-color:#ff9c00" >
    <h3 class="tenKhung" style="background-image: linear-gradient(120deg,#ff9c00 0%, #ec1f1f 50%,#ff9c00 100%);">Sản Phẩm Của Cửa Hàng</h3>
    <div class="listSpTrongKhung flexContain" data-tenkhung="NỔI BẬT NHẤT">
        <?php

        $search = (isset($_GET['search'])) ? $_GET['search'] : '';
        $min = (isset($_GET['min'])) ? $_GET['min'] : '';
        $max = (isset($_GET['max'])) ? $_GET['max'] : '';
        $searchCompany = (isset($_GET['searchCompany'])) ? $_GET['searchCompany'] : '';
        $sql_product="select * from sanpham order by MaSP desc limit 10 ";

        if($min!='' and $max!=''){
            $Khoanggia= "DonGia< $max and DonGia >$min";
            $sql_product="select * from sanpham where $Khoanggia order by MaSP desc limit 10 ";
        }
        if($searchCompany!='' ){
            $sql_loaisp="select * from loaisanpham where TenLSP like '$searchCompany' ";
            $q_lsp=mysqli_query($conn,$sql_loaisp);
            $result_lsp=mysqli_fetch_array($q_lsp);
            $locLSP= "MaLSP like '".$result_lsp['MaLSP']."'";
            $sql_product="select * from sanpham where $locLSP order by MaSP desc limit 10 ";
        }
        if($search!='' ){
            $sql_loaisp="select * from loaisanpham where TenLSP like '$search' ";
            $q_lsp=mysqli_query($conn,$sql_loaisp);
            $result_lsp=mysqli_fetch_array($q_lsp);
            $locLSP='';
            if(isset($result_lsp['MaLSP'])) {
                $locLSP = "MaLSP like '" . $result_lsp['MaLSP'] . "'or";
            }
            $sql_product="select * from sanpham where $locLSP  TenSP like '%$search%'    order by MaSP desc limit 10 ";
//                        var_dump($sql_product);
        }
        $result=mysqli_query($conn,$sql_product );?>
        <?php while ($row=mysqli_fetch_array($result)){?>
            <li class="sanPham">

                <a href="chitietsanpham.php?id=<?php echo$row['MaSP']  ?>">
                    <img src="<?php echo $row['HinhAnh'] ?>" alt="">
                    <h3><?php echo $row['TenSP'] ?></h3>
                    <div class="price">
                        <strong><?php echo number_format($row['DonGia'], 0, ',');?>₫</strong>
                        <span><?php $DonGia1=$row['DonGia']+$row['MaKM']; echo number_format($DonGia1, 0, ',');?>₫</span>
                    </div>
                    <label class="giamgia">
                        <i class="fa fa-bolt"></i> Giảm <?php echo number_format($row['MaKM'], 0, ',');?>₫
                    </label>
                </a>
            </li>
        <?php }?>

    </div>
    <a class="xemTatCa" href="" style="	border-left: 2px solid #ff9c00;
					border-right: 2px solid #ff9c00;">
        Xem thêm sản phẩm
    </a>

</div>