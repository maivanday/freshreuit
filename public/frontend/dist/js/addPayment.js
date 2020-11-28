
//----------------------
function payment(event){
    event.preventDefault();

      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})
    var email='';
    var phone='';
    var address='';
    var name='';
    var total=$('.total').text();
    var checkAddress =$('input[name=checkAddress]');
    $.each(checkAddress,function(key,value){
        if(value.checked === true){
            email=value.value;
            phone = $('.phone'+key).text();
            address = $('.address'+key).text();
            name = $('.name'+key).text();


        }
    });
    $.ajax({
        url:'payment',
        type: 'post',
        data:{
            name:name,
            email:email,
            phone:phone,
            address:address,
            price:total,

        },
        dataType: 'json',

        success: function(data) {
            alert(" Đặt hàng thành công");



        },




    })





}

//---------------------------


$(function(){

  $('.payment').on('click', payment);

}
)
