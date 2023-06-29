$(document).ready(function () {
    $('.addToCartBtn').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        $.ajax({
            method: "POST",
            url: "/addtocart",
            data: {
                'productid': product_id,
                'quantity': product_qty,
            },
            success: function (resopnse) {
                alert(resopnse.status);
            }
        });
    });
    $('.increment-btn').click(function (e) {
        e.preventDefault();
        //var inc_value = $('.qty-input').val();
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {

            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        //var dec_value = $('.qty-input').val();
        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });
    $('.delete-cart-item').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        var productid = $(this).closest('.product_data').find('.productid').val();
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'productid': productid,
            },
            success: function (resopnse) {
                window.location.reload();
                swal("",resopnse.status,"success");
            }
        });
    });
    $('.changeqtybtn').click(function (e) {
        e.preventDefault();
        var productid = $(this).closest('.product_data').find('.productid').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        data= {
            'productid': productid,
            'quantity': qty,
        }
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (resopnse) {
              window.location.reload();
              
            }
        });
    });
});
