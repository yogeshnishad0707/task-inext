{{-- <link rel="icon" href="{{ asset('assets/webpannel/img/kaiadmin/favicon.ico') }}" type="image/x-icon" /> --}}
<link rel="shortcut icon" href="{{ asset('assets/images/icon.png') }}" type="image/x-icon" />

<!-- Fonts and icons -->
<link rel="stylesheet" href="{{ asset('assets/webpannel/css/select2.css') }}">

<!--  select2 css   -->
<link rel="stylesheet" href="{{ asset('assets/webpannel/css/select2.min.css') }}" />


{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" /> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Sweet Alert -->
<script src="{{ asset('assets/webpannel/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/webpannel/js/plugin/webfont/webfont.min.js') }}"></script>
<script src="{{ asset('assets/webpannel/js/plugin/select2/select2.full.min.js') }}"></script>
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
    .badge {
        display: inline-block;
        min-width: 10px;
        padding: 3px 7px;
        font-size: 12px;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        background-color: #777;
        border-radius: 10px;
    }

    .shtcutbtn {
        background: #F39A29;
    }

    .shtcut {
        color: #fff;
    }
</style>
