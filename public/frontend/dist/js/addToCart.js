
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

//---------------------------

$(function(){
  $('.add-to-cart').on('click', adToCart);


}
);
//



