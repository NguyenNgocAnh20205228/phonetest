<div class="khachhang" style="display: block;">
    <table class="table-header">
        <tbody><tr>
            <!-- Theo độ rộng của table content -->
            <th title="Sắp xếp" style="width: 5%" onclick="">Stt <i class="fa fa-sort"></i></th>
            <th title="Sắp xếp" style="width: 10%" onclick="">Họ tên <i class="fa fa-sort"></i></th>
            <th title="Sắp xếp" style="width: 10%" onclick="">Địa Chỉ <i class="fa fa-sort"></i></th>
            <th title="Sắp xếp" style="width: 10%" onclick="">Email <i class="fa fa-sort"></i></th>
            <th title="Sắp xếp" style="width: 10%" onclick="">Tài khoản <i class="fa fa-sort"></i></th>
            <th title="Sắp xếp" style="width: 25%" onclick="">Mật khẩu <i class="fa fa-sort"></i></th>
            <th style="width: 10%">Hành động</th>
        </tr>
        </tbody></table>
    <?php
    require_once ('php/connect.php');
    $sql_ND="select * from nguoidung";
    $result=mysqli_query($conn,$sql_ND );?>

    <div class="table-content"><table class="table-outline hideImg"><tbody>
            <?php
            $i=1;
            while ($row=mysqli_fetch_array($result)){?>
            <tr>
                <td style="width: 5%"><?php echo $i++ ?></td>
                <td style="width: 10%"><?php echo $row['Ho'].''.$row['Ten']?></td>
                <td style="width: 10%"><?php echo $row['DiaChi']?></td>
                <td style="width: 10%"><?php echo $row['Email']?></td>
                <td style="width: 10%"><?php echo $row['TaiKhoan']?></td>
                <td style="width: 25%"><?php echo $row['MatKhau']?></td>
                <td style="width: 10%">
                    <div class="tooltip">
                        <label class="switch">
                            <input type="checkbox" <?php if ($row['TrangThai']==1){ echo "checked='checked'";}?> onclick="doiTrangThaiND(<?php echo $row['MaND']?>)">
                            <span class="slider round"></span>
                        </label>
                        <span class="tooltiptext">Khóa</span>
                    </div>
                    <div class="tooltip">
                        <i class="fa fa-remove" onclick="xoaNguoiDung('abc')"></i>
                        <span class="tooltiptext">Xóa</span>
                    </div>
                </td>
            </tr>
            <?php } ?>

            </tbody></table></div>

    <div class="table-footer">
        <select name="kieuTimKhachHang">
            <option value="ten">Tìm theo họ tên</option>
            <option value="email">Tìm theo email</option>
            <option value="taikhoan">Tìm theo tài khoản</option>
        </select>
        <input type="text" placeholder="Tìm kiếm..." onkeyup="timKiemNguoiDung(this)">
        <button onclick="openThemNguoiDung()"><i class="fa fa-plus-square"></i> Thêm người dùng</button>
    </div>
</div>