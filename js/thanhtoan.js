function getDiaChi(){
    var Ho=$('#Ho').val();
    var Ten=$('#Ten').val();
    var phone_number=$('#phone_number').val();
    var province=$('#province').val();
    var district=$('#district').val();
    var specific_address=$('#specific_address').val();
    var formData = new FormData();
    formData.append('Ho', Ho);
    formData.append('Ten', Ten);
    formData.append('phone_number', phone_number);
    formData.append('province', province);
    formData.append('district', district);
    formData.append('specific_address', specific_address);

    $.ajax({
        type: "POST",
        url: './php/Process_ThanhToan.php?action=getSessionDiaChi',
        data:formData,
        processData: false,
        contentType: false,
        success: function () {
            window.location="thanhtoan.php";
        }
    });
}
function add_DonHang(){

    $.ajax({
        type: "POST",
        url: './php/Process_ThanhToan.php?action=addGioHangSQL',
        success: function () {
            alert("bạn đã đặt hành thành công")
            window.location="index.php";
        }
    });
}