<!DOCTYPE html>
<html>
  <head>
    <title>পরিবহন</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="{{asset('admin/img/favicon.png')}}" rel="shortcut icon">
        <link href="{{asset('admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
  <link href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/dropzone/dist/dropzone.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/slick-carousel/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/main.css?version=4.4.0')}}" rel="stylesheet">
  </head>
  <body class="auth-wrapper">
    <div class="all-wrapper menu-side with-pattern">
      <div class="auth-box-w">
        <div class="logo-w">
          <a href="index.html"><img alt="" src="{{asset('admin/img/logo-big.png')}}"></a>
        </div>
        <h4 class="auth-header">
            লগ ইন করুন 
        </h4>
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf
          <div class="form-group">
            <label for="">ইমেইল বা ইউজারনাম</label>
            <input id="email" placeholder="ইমেইল বা ইউজার নাম" type="text" class="form-control{{ $errors->has('name') || $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('name') ?: old('email') }}" required autofocus>
            <div class="pre-icon os-icon os-icon-user-male-circle"></div>
          </div>
          <div class="form-group">
            <label for="">পাসওয়ার্ড</label>
            <input id="password" placeholder="পাসওয়ার্ড" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required id="password">
            <div class="pre-icon os-icon os-icon-fingerprint"></div>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                    
                </span>
            @endif
          </div>
          <div class="buttons-w">
            <button class="btn btn-primary">প্রবেশ করুন</button>
            <div class="form-check-inline">
              <label class="form-check-label"><input class="form-check-input" type="checkbox" name="remember" id="remember"{{ old('remember') ? 'checked' : '' }}>Remember Me</label>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
