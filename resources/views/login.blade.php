<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loginAdmin</title>
    <link rel="stylesheet" href="{{asset('frontend/dist/css/bootstrap.min.css')}}" />

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }

        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            height: 320px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }

        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }

        #login .container #login-row #login-column #login-box #login-form #back-home-link {
            margin-top: -49px;
        }
    </style>
</head>

<body>
    <div id="login">

        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            @csrf
                            <h3 class="text-center text-info">Đăng nhập</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Email</label><br>
                                <input type="email" name="email" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <!-- <label for="remember-me" class="text-info"><span>Remember me</span> <span>
                                        <input id="remember-me" name="remember_me" type="checkbox"></span></label><br> -->
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Đăng nhập">
                            </div>
                            <div id="back-home-link" class="text-right">
                                <a href="{{ route('home')}}" class="text-info"> Trở về</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('frontend/dist/js/jquery-3.5.1.min.js')}}"> </script>
    <script src="{{asset('frontend/dist/js/bootstrap.min.js')}}"></script>
</body>

</html>
