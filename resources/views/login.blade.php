<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login Page</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />

    {{-- <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon" /> --}}
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/webpannel/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/webpannel/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/webpannel/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/webpannel/css/kaiadmin.min.css') }}" />

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets/webpannel/css/demo.css') }}" />
    <style>
        .button {
            width: 95%;
            margin-left: 12px;
            border-radius: 6px;
            height: 29px;
            background: lightsteelblue;
            text-align: center;
        }

        /* Mobile view adjustments */
        @media (max-width: 768px) {
            .card {
                margin-left: 15px;
                margin-right: 15px;
            }
            .img{
                margin-left: 90px;
                margin-bottom: 20px;
                width: 185px;
                margin-top: -18px;
            }
            .container {
                padding: 0;
            }

            .card-header .card-title {
                font-size: 22px;
            }

            .form-group label {
                font-size: 14px;
            }

            .form-control {
                padding-left: 40px;
            }

            .form-check {
                font-size: 12px;
                margin-left: 172px;
                margin-top: -33px;
            }
            .col-md-12{
                padding: 0px;
            }
            .col-md-6{
                padding-left: 0px;
            }
            /* .fp{
                margin-left: 172px;
                margin-top: -33px;
            } */

            .button {
                height: 40px;
            }
        }

        /* Desktop view adjustments */
        @media (min-width: 769px) {
            .desk-card {
                margin-left: 170px;
                margin-right: 490px;
            }
            .desk-img {
                margin-left: 255px;
                margin-bottom: 10px;
            }
            .card-header .card-title {
                font-size: 26px;
            }
            .form-control {
                padding-left: 50px;
            }
            .form-check{
                margin-top: -14px;
                margin-left: 20px;
            }
            .button {
                height: 45px;
            }
        }
    </style>

</head>

<body>
    
    <div class="wrapper" style="background: border-box;">
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                        
                            <div class="card desk-card" style="border: solid 1px;">
                                <div class="card-header">
                                    <div class="card-title" style="font-size: 26px;margin-top: -8px;">Login</div>
                                
                                </div>

                                @if (session('error'))
                                    <div class="alert alert-warning">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 88px;"></button>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <form action="{{ url('login') }}" method='POST' class='form-validate'
                                        id="test">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <div class="input-icon">
                                                        <span class="input-icon-addon">
                                                            <i class="fas fa-envelope"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="email" required
                                                            id="email" placeholder="Enter Email Id"
                                                            style="padding-left: 50px;" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -10px;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Password</label>
                                                    <div class="input-icon">
                                                        <span class="input-icon-addon">
                                                            <i class="fas fa-unlock-alt"></i>
                                                        </span>
                                                        <input type="password" class="form-control" name="password"
                                                            id="password" placeholder="Enter Password" required
                                                            style="padding-left: 50px;" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <a href="{{ route('registerform') }}" class="fp">keep register</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <button type="submit" class="button">Login</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Script -->
    @include('inc/script')
    <!-- End Script -->

</body>

</html>

