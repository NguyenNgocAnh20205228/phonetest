
function updatequantity(quantity){
    if (quantity != "") {
        $.ajax({
            type: "POST",
            url: './php/process_cart.php?action=update',
            data: $('#cart-form').serializeArray(),
            success: function () {
                    $.get('./card-form.php', function (cartContentHTML) {
                        // console.log(cartContentHTML);
                        $('#cart-form').html(cartContentHTML);
                    });
            }
        });
    }
}

function tangSoLuong(id) {
        $.ajax({
            type: "POST",
            url: './php/process_cart.php?action=tangsoluong&id='+id,
            success: function () {
                $.get('./card-form.php', function (cartContentHTML) {
                    // console.log(cartContentHTML);
                    $('#cart-form').html(cartContentHTML);
                });
            }
        });
    // console.log('aadsasds')

}

function giamsoluong(id) {
    $.ajax({
        type: "POST",
        url: './php/process_cart.php?action=giamsoluong&id='+id,
        success: function () {
            $.get('./card-form.php', function (cartContentHTML) {
                // console.log(cartContentHTML);
                $('#cart-form').html(cartContentHTML);
            });
        }
    });

}