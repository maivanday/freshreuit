
function adToCart(event){
    event.preventDefault();
    let urlAdd =$(this).data('url');
$.ajax({
    type: 'GET',
    url: urlAdd,
    dataType: 'json',
    success: function(data){
        if(data.code === 200){
            alert('Thêm sản phẩm thành công');
        }

    },
    error: function(){

    }

})

}
function cartDelete(event) {
            event.preventDefault();
            let urlDelete = $('.cart').data('url');
            let id = $(this).data('id');

            $.ajax({
                type: "GET",
                url: urlDelete,
                data: {
                    id: id,

                },
                success: function(data) {

                    if (data.code === 200) {
                        $('.cart_wrapper').html(data.cartUpdate);
                        alert('Xoá nhật thành công');
                    }
                },
                error: function() {

                }

            });
        }
    $(document).ready(function() {
         $('#quantity').change(function(event){
            event.preventDefault();
            let urlUpdate = $('.update_cart_url').data('url');
            let id = $("#idProduct").data('id');
            let quantity = $(this).val();

             $.ajax({
                type: "GET",
                url: urlUpdate,
                data: {
                    _token:"{{csrf_token()}}",
                    id: id,
                    quantity: quantity
                },
                success: function(data) {

                    if (data.code === 200) {
                        // $('.cart_wrapper').html(data.cartUpdate);
                        window.location.reload();

                    }
                },
                error: function() {

                }

            });
        })
    })


        //    function cartUpdate(event) {
        //     event.preventDefault();
        //     let urlUpdate = $('.update_cart_url').data('url');
        //     let id = $(this).data('id');
        //     let quantity = $(this).parents('tr').find('input').val();


        //     $.ajax({
        //         type: "GET",
        //         url: urlUpdate,
        //         data: {
        //             id: id,
        //             quantity: quantity
        //         },
        //         success: function(data) {

        //             if (data.code === 200) {
        //                 $('.cart_wrapper').html(data.cartUpdate);

        //             }
        //         },
        //         error: function() {

        //         }

        //     });

        //}


//---------------------------

$(function(){
  $('.add-to-cart').on('click', adToCart);
  $('.cart_delete').on('click', cartDelete);
 // $('.cart_update').on('click', cartUpdate);
}
);
//



