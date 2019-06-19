<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.7.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>FMS | Fly Mail Service</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('backend/assets/global/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/assets/admin/pages/css/login-soft.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{ asset('backend/assets/global/css/components-rounded.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/assets/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{ asset('backend/assets/admin/layout/css/themes/default.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('backend/assets/admin/layout/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="{{ asset('ContractFiles/logo.png') }}"/>
    <style>
        .fms-logo{
            color: #ffffff !important;
            padding-top: 7px;
            font-size: 20px;
            text-decoration: none !important;
        }
        .fms-logo span {
            color: #ff5e00;
        }
        #s2id_autogen1 .select2-choice, #s2id_autogen3 .select2-choice, #s2id_autogen5 .select2-choices{
            border: none !important;
        }
        .is-invalid{
            border: 1px solid red;
        }
    </style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="{{ route('admin.index') }}" class="fms-logo">
        <span>Fly</span> Mail Service
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN REGISTRATION FORM -->
    <form class="register-form" action="{{ route('users.store') }}" method="post">
        @csrf
        <h3>Sign Up</h3>
        <p>
            Enter your personal details below:
        </p>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Organ</label>
            <div class="input-icon @error('organs') is-invalid @enderror">
                <i class="fa fa-building"></i>
                <select style="padding-left: 20px" class="form-control placeholder-no-fix select2" name="organs">
                    <option selected>--select once--</option>
                    @foreach($organs as $organ)
                        <option value="{{ $organ->id }}">{{ $organ->name_ru }}</option>
                    @endforeach
                </select>
            </div>
            @error('organs')
                <span class="text-danger" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Roles</label>
            <div class="input-icon @error('roles') is-invalid @enderror">
                <i class="fa fa-user-secret"></i>
                <select style="padding-left: 20px" class="form-control placeholder-no-fix select2" name="roles">
                    <option selected disabled>--select once--</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('roles')
            <span class="text-danger" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Permissions</label>
            <div class="input-icon @error('permissions') is-invalid @enderror">
                <i class="fa fa-plus-square-o"></i>
                <select style="padding-left: 20px" class="form-control placeholder-no-fix select2" name="permissions[]" multiple>
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('permissions')
                <span class="text-danger" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <p>
            Enter your account details below:
        </p>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9" for="username">Username</label>
            <div class="input-icon @error('username') is-invalid @enderror">
                <i class="fa fa-user"></i>
                <input id="username" class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
            </div>
            @error('username')
                <span class="text-danger" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Phone</label>
            <div class="input-icon">
                <i class="fa fa-phone"></i>
                <input class="form-control placeholder-no-fix @error('phone') is-invalid @enderror" type="text" placeholder="Phone" name="phone" id="phone_reg" value="+998 (__) ___-__-__">
            </div>
            @error('phone')
            <span class="text-danger" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <div class="input-icon">
                <i class="fa fa-envelope"></i>
                <input class="form-control placeholder-no-fix @error('email') is-invalid @enderror" type="text" placeholder="Email" name="email"/>
            </div>
            @error('email')
                <span class="text-danger" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon @error('password') is-invalid @enderror">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
            </div>
            @error('password')
            <span class="text-danger" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
            <div class="controls">
                <div class="input-icon">
                    <i class="fa fa-check"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="password_confirmation"/>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button id="register-back-btn" type="button" class="btn">
                <a href="{{ url()->previous() }}" style="text-decoration: none; color: black"><i class="m-icon-swapleft"></i> Back</a> </button>
            <button type="submit" id="register-submit-btn" class="btn blue pull-right">
                Sign Up <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>
    </form>
    <!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
    2019 &copy; "Nomad-techno" MCHJ.
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{ asset('backend/assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ asset('backend/assets/global/plugins/excanvas.min.js') }}"></script>
<![endif]-->
<script src="{{ asset('backend/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('backend/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/global/plugins/backstretch/jquery.backstretch.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('backend/assets/global/plugins/select2/select2.min.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('backend/assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/admin/layout/scripts/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/admin/pages/scripts/login-soft.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/js/scripts.js') }}"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        // Login.init();
        Demo.init();
        // init background slide images
        $('.select2').select2();
        $.backstretch([
                "{{ asset('backend/assets/admin/pages/media/bg/1.jpg') }}",
                "{{ asset('backend/assets/admin/pages/media/bg/2.jpg') }}",
                "{{ asset('backend/assets/admin/pages/media/bg/3.jpg') }}",
                "{{ asset('backend/assets/admin/pages/media/bg/4.jpg') }}"
            ], {
                fade: 1000,
                duration: 8000
            }
        );
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
