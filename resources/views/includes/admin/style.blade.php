<link rel="icon" href="{{ url('backend/assets/img/icon.ico') }}" type="image/x-icon" />

<!-- Fonts and icons -->
<script src="{{ url('backend/assets/js/plugin/webfont/webfont.min.js') }}"></script>
<script>
    WebFont.load({
        google: {
            "families": ["Lato:300,400,700,900"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ['{{ url('backend/assets/css/fonts.min.css') }}']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="{{ url('backend/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('backend/assets/css/atlantis.min.css') }}">
<link rel="stylesheet" href="{{ url('backend/assets/css/datatables.css') }}">

<!-- Bootstrap Select CSS -->
<link rel="stylesheet" href="{{ url('backend/assets/css/bootstrap-select.min.css') }}">
<script src="{{ url('backend/assets/js/core/jquery.3.2.1.min.js') }}"></script>
