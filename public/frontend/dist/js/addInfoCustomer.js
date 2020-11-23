

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
                    toastr.success(data, 'thong bao');
                    location.reload();
                },
                error: function(data) {
                    var error = $.parseJSON(data.responseText);

                }


            })

}

//---------------------------


$(function(){
  $('.save').on('click', updateInfo);

}
);
        // update info


        // $('.save').click(function() {


        //     $.ajax({

        //         url: 'customer',
        //         type: 'post',
        //         data: {
        //             email: $('.email').val(),
        //             address: $('.address').val(),
        //             phone: $('.phone').val(),

        //         },
        //         dataType: 'json',
        //         success: function(data) {
        //             $('#address').modal('hide');
        //             toastr.success(data, 'thong bao');
        //             location.reload();
        //         },
        //         error: function(data) {
        //             var error = $.parseJSON(data.responseText);

        //         }


        //     })
        // });
