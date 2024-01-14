<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('backend/asset/login/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ url('backend/asset/login/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('backend/asset/login/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('backend/asset/login/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('backend/asset/login/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                {{-- <img src="{{ url('backend/assets/images/restok 3.png') }}" alt="logo"> --}}
                                <img src="{{ url('backend/asset/login/images/logo.svg') }}" alt="logo">
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" action="/postlogin" method="post" id="quickForm">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="nik"
                                        id="nik" placeholder="NIK" value="{{ old('nik') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        style="background-color: #1269DB">Login</button>
                                    {{-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN IN</a> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ url('backend/asset/login/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ url('backend/asset/login/js/off-canvas.js') }}"></script>
    <script src="{{ url('backend/asset/login/js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('backend/asset/login/js/template.js') }}"></script>
    <script src="{{ url('backend/asset/login/js/settings.js') }}"></script>
    <script src="{{ url('backend/asset/login/js/todolist.js') }}"></script>
    <!-- endinject -->
</body>

</html>
