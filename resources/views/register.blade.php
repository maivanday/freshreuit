<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 300px;
        }

        #register .container #register-row #register-column #register-box {
            margin-top: 120px;
            max-width: 600px;
            height: 375px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }

        #register .container #register-row #register-column #register-box #register-form {
            padding: 20px;
        }

        #register .container #register-row #register-column #register-box #register-form #login-link {
            margin-top: -60px;
        }
    </style>
</head>

<body>
    <div id="register">

        <div class="container">
            <div id="register-row" class="row justify-content-center align-items-center">
                <div id="register-column" class="col-md-6">
                    <div id="register-box" class="col-md-12">
                        <form id="register-form" class="form" action="" method="post">
                            @csrf
                            <h3 class="text-center text-info">Đăng ký</h3>
                            <div class="form-group">
                                <label for="name" class="text-info">Username</label><br>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">

                                <input type="submit" name="register" class="btn btn-info btn-md" value="Đăng ký">
                            </div>
                            <div id="login-link" class="text-right">
                                <a href="{{ route('home')}}" class="text-info"> Trở về</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
