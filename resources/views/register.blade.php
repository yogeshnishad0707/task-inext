<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Register Page</title>
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

            .img {
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

            .col-md-12 {
                padding: 0px;
            }

            .col-md-6 {
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

            .form-check {
                margin-top: -14px;
                margin-left: 20px;
            }

            .button {
                height: 45px;
            }

            .page-inner {
                width: 112%;
            }

            .labelcolor {
                color: white;
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
                                    <div class="card-title" style="font-size: 26px;margin-top: -8px;">REGISTRATION</div>
                                
                                </div>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong><i class="fa fa-clone"></i> {{ $error }} </strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="card-body">
                                    <form action="{{ route('register') }}" method='POST' class='form-validate'
                                        id="test" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label labelcolor">First Name</label>
                                                    <div class="input-icon">
                                                        <input type="text" class="form-control" name="firstname"
                                                            required placeholder="Enter Name"
                                                            style="padding-left: 10px;" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label>
                                                    <div class="input-icon">
                                                        <input type="text" class="form-control" name="lastname"
                                                            placeholder="Enter Last Name" required
                                                            style="padding-left: 10px;" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -10px;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Date Of Birth</label>
                                                    <div class="input-icon">
                                                        <input type="date" class="form-control" name="dob"
                                                            placeholder="DOB" required style="padding-left: 10px;" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email Id</label>
                                                    <div class="input-icon">
                                                        <input type="email" class="form-control" name="email"
                                                            placeholder="Enter Email" required
                                                            style="padding-left: 10px;" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -10px;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Phone Number</label>
                                                    <div class="input-icon">
                                                        <input type="number" class="form-control" name="phone"
                                                            maxlength="10"
                                                            oninput="javascript: if (this.value.length > this.maxLength)this.value = this.value.slice (0,this.maxLength);"
                                                            placeholder="Enter Phone Number" required
                                                            style="padding-left: 10px;" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Password</label>
                                                    <div class="input-icon">
                                                        <input type="password" class="form-control" name="password"
                                                            placeholder="Enter Password" required
                                                            style="padding-left: 10px;" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: -10px;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Photo(Upload)</label>
                                                    <div class="input-icon">
                                                        <input type="file" class="form-control" name="photo"
                                                            placeholder="Enter Photo" style="padding-left: 10px;" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Address</label>
                                                    <div class="input-icon">
                                                        <input type="text" class="form-control" name="address"
                                                            placeholder="Enter Address" required
                                                            style="padding-left: 10px;" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <a href="{{ route('login') }}" class="fp">Keep Login</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <button type="submit" class="button">Submit</button>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        @if (session()->has('success'))
            swal({
                title: "SUCCESS!",
                text: "{{ session('success') }}",
                icon: "success",
                button: {
                    confirm: {
                        text: "OK",
                        className: "btn btn-success",
                    },
                },
            });
        @endif
    </script>
        
    <script>
        @if (session()->has('error'))
        swal({
            title: "ERROR!",
            text: "{{ session('error') }}",
            icon: "warning",
            button: {
                confirm: {
                    text: "OK",
                    className: "btn btn-warning",
                },
            },
        });
        @endif
    </script>
    

    <!-- Start Script -->
    @include('inc/script')
    <!-- End Script -->

</body>

</html>
