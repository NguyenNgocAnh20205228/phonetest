function getsanpham(){
    $.get('sanpham.php', function (cartContentHTML) {
         
        $('#main-content').html(cartContentHTML);
    });
}
function getdonhang(){
    $.get('donhang.php', function (cartContentHTML) {
         
        $('#main-content').html(cartContentHTML);
    });
}
function getkhachhang(){
    $.get('khachhang.php', function (cartContentHTML) {
         
        $('#main-content').html(cartContentHTML);
    });
}
function gethome(){
    $.get('home.php', function (cartContentHTML) {
         
        $('#main-content').html(cartContentHTML);
    });
}
function viewProduct(id){
            $.get('./add_update_product.php?updateProduct='+id, function (cartContentHTML) {
                $('#khungThemSanPham').html(cartContentHTML);
                document.getElementById('khungThemSanPham').style.transform = 'scale(1)';
    });
}
function viewAddProduct(){
            $.get('./add_update_product.php', function (cartContentHTML) {
                $('#khungThemSanPham').html(cartContentHTML);
                document.getElementById('khungThemSanPham').style.transform = 'scale(1)';
    });
}

function addProduct(){
    // console.log('sdasddsa');
    var MaSP=$('#MaSP').val();
    var MaLSP=$('#MaLSP').val();
    var TenSP=$('#TenSP').val();
    var DonGia=$('#DonGia').val();
    var SoLuong=$('#SoLuong').val();

    var fileInput = document.getElementById('HinhAnh');
    var file = fileInput.files[0];

    if (!file) {
        alert('Please select a file.');
        return;
    }

    var MaKM=$('#MaKM').val();
    var SoLuong=$('#SoLuong').val();
    var ManHinh=$('#ManHinh').val();
    var HDH=$('#HDH').val();
    var CamSau=$('#CamSau').val();
    var CamTruoc=$('#CamTruoc').val();
    var CPU=$('#CPU').val();
    var Ram=$('#Ram').val();
    var Rom=$('#Rom').val();
    var SDCard=$('#SDCard').val();
    var Pin=$('#Pin').val();
    var SoSao=$('#SoSao').val();
    var SoDanhGia=$('#SoDanhGia').val();
    var formData = new FormData();
    formData.append('MaLSP', MaLSP);
    formData.append('SoLuong', SoLuong);
    formData.append('TenSP', TenSP);
    formData.append('DonGia', DonGia);
    formData.append('HinhAnh', file);
    formData.append('MaKM', MaKM);
    formData.append('ManHinh', ManHinh);
    formData.append('HDH', HDH);
    formData.append('CamSau', CamSau);
    formData.append('CamTruoc', CamTruoc);
    formData.append('CPU', CPU);
    formData.append('Ram', Ram);
    formData.append('Rom', Rom);
    formData.append('SDCard', SDCard);
    formData.append('Pin', Pin);
    formData.append('SoSao', SoSao);
    formData.append('SoDanhGia', SoDanhGia);

    $.ajax({
        method: "POST",
        url: './php/process_product.php?action=addproduct',
        data:formData,
        processData: false,
        contentType: false,
        success: function () {
            document.getElementById('khungThemSanPham').style.transform = 'scale(0)';
            $.get('sanpham.php', function (cartContentHTML) {
                $('#main-content').html(cartContentHTML);
            });

        }
    });
    // console.log('dsasdadsasda')
}
function updateProduct(){
    var MaSP=$('#MaSP').val();
    var MaLSP=$('#MaLSP').val();
    var TenSP=$('#TenSP').val();
    var DonGia=$('#DonGia').val();
    var SoLuong=$('#SoLuong').val();

    var fileInput = document.getElementById('HinhAnh');
    var file = fileInput.files[0];
    if (!file) {
        file=null;
    }
    var MaKM=$('#MaKM').val();
    var SoLuong=$('#SoLuong').val();
    var ManHinh=$('#ManHinh').val();
    var HDH=$('#HDH').val();
    var CamSau=$('#CamSau').val();
    var CamTruoc=$('#CamTruoc').val();
    var CPU=$('#CPU').val();
    var Ram=$('#Ram').val();
    var Rom=$('#Rom').val();
    var SDCard=$('#SDCard').val();
    var Pin=$('#Pin').val();
    var SoSao=$('#SoSao').val();
    var SoDanhGia=$('#SoDanhGia').val();
    var formData = new FormData();
    formData.append('MaSP', MaSP);
    formData.append('MaLSP', MaLSP);
    formData.append('SoLuong', SoLuong);
    formData.append('TenSP', TenSP);
    formData.append('DonGia', DonGia);
    formData.append('HinhAnh', file);
    formData.append('MaKM', MaKM);
    formData.append('ManHinh', ManHinh);
    formData.append('HDH', HDH);
    formData.append('CamSau', CamSau);
    formData.append('CamTruoc', CamTruoc);
    formData.append('CPU', CPU);
    formData.append('Ram', Ram);
    formData.append('Rom', Rom);
    formData.append('SDCard', SDCard);
    formData.append('Pin', Pin);
    formData.append('SoSao', SoSao);
    formData.append('SoDanhGia', SoDanhGia);

    $.ajax({
        method: "POST",
        url: './php/process_product.php?action=updateProduct',
        data:formData,
        processData: false,
        contentType: false,
        success: function () {
            document.getElementById('khungThemSanPham').style.transform = 'scale(0)';
            $.get('sanpham.php', function (cartContentHTML) {
                $('#main-content').html(cartContentHTML);
            });

        }
    });
}
function deleteProduct(id){
    let text = "bạn có chắc muốn xoá điện thoại này ?";
    if (confirm(text) == true) {
        $.ajax({
            method: "POST",
            url: './php/process_product.php?action=deleteproduct&id='+id,
            success: function () {
                $.get('sanpham.php', function (cartContentHTML) {
                    $('#main-content').html(cartContentHTML);
                });
            }
        });
    } else {
    }

}
function duyetDonHang(id){
    console.log(id);
    $.ajax({
        method: "POST",
        url: './php/process_DonHang.php?action=xacNhan&id='+id,
        success: function () {
            $.get('donhang.php', function (cartContentHTML) {
                $('#main-content').html(cartContentHTML);
            });
        }
    });
}
function choXuLy(id){
    console.log(id);
    $.ajax({
        method: "POST",
        url: './php/process_DonHang.php?action=choXuLy&id='+id,
        success: function () {
            $.get('donhang.php', function (cartContentHTML) {
                $('#main-content').html(cartContentHTML);
            });
        }
    });
}
function huy(id){
    console.log(id);
    $.ajax({
        method: "POST",
        url: './php/process_DonHang.php?action=huy&id='+id,
        success: function () {
            $.get('donhang.php', function (cartContentHTML) {
                $('#main-content').html(cartContentHTML);
            });
        }
    });
}
function doiTrangThaiND(id){
    console.log(id);
    $.ajax({
        method: "POST",
        url: './php/process_KhachHang.php?id='+id,
        success: function () {
            $.get('khachhang.php', function (cartContentHTML) {
                $('#main-content').html(cartContentHTML);
            });
        }
    });
}



