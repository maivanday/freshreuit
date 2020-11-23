
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

//---------------------------

$(function(){
  $('.add-to-cart').on('click', adToCart);
  $('.add-to-cart').on('click', cartDelete);
}
);
//



