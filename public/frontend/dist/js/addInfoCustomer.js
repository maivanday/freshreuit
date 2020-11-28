
function updateInfo(event){
    event.preventDefault();
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})


                $.ajax({

                url: 'checkCart',
                type: 'post',
                data: {
                    name: $('.name').val(),
                    email: $('.email').val(),
                    address: $('.address').val(),
                    phone: $('.phone').val(),

                },
                dataType: 'json',
                success: function(data) {
                    $('#address').modal('hide');
                    toastr.success(data, 'Cập nhật địa chỉ thành công',{timeOut: 5000});
                    location.reload();
                },
                error: function(data) {
                    var error = $.parseJSON(data.responseText);

                }


            })

}
//----------------------
// function payment(event){
//     event.preventDefault();

//       $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// })
//     var email='';
//     var phone='';
//     var address='';
//     var name='';
//     var total=$('.total').text();
//     var checkAddress =$('input[name=checkAddress]');
//     $.each(checkAddress,function(key,value){
//         if(value.checked === true){
//             email=value.value;
//             phone = $('.phone'+key).text();
//             address = $('.address'+key).text();
//             name = $('.name'+key).text();


//         }
//     });
//     $.ajax({
//         url:'checkCart/payment',
//         type: 'post',
//         data:{
//             name:name,
//             email:email,
//             phone:phone,
//             address:address,
//             price:total,

//         },
//         dataType: 'json',

//         success: function(data) {
//             toastr.success(data, 'Đặt hàng thành công',{timeOut: 5000});
//                     location.reload();


//         },




//     })





// }

//---------------------------


$(function(){
  $('.save').on('click', updateInfo);
 // $('.payment').on('click', payment);

}
)
