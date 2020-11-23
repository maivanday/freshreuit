<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show cart</title>
    <link rel="stylesheet" href="{{asset('frontend/dist/css/fontawesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/dist/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('frontend/dist/css/style.css')}}" />

</head>

<body>
    @include('components/header_user');
    <div class="cart_wrapper">

        @include('frontend_web/product/cartContent');

    </div>







    <!-- cart update -->
    <script src="{{asset('frontend/dist/js/jquery-3.5.1.min.js')}}"> </script>


    <!-- <script>
        function cartUpdate(event) {
            event.preventDefault();
            let urlUpdate = $('.update_cart_url').data('url');
            let id = $(this).data('id');
            let quantity = $(this).parents('tr').find('input').val();


            $.ajax({
                type: "GET",
                url: urlUpdate,
                data: {
                    id: id,
                    quantity: quantity
                },
                success: function(data) {

                    if (data.code === 200) {
                        $('.cart_wrapper').html(data.cartUpdate);

                    }
                },
                error: function() {

                }

            });

        }

        //
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
        //
        $(function() {
            $(document).on('click', '.cart_update', cartUpdate);
            $(document).on('click', '.cart_delete', cartDelete);

        });
    </script> -->
    <script src="{{asset('frontend/dist/js/addToCart.js')}}"></script>

    <script src="{{asset('frontend/dist/js/jquery-3.5.1.min.js')}}"> </script>
    <script src="{{asset('frontend/dist/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/dist/js/bootstrap.min.js')}}"></script>
</body>



</html>
