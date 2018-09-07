<!DOCTYPE html>
<html lang="{{get_current_locale()}}">
<head>
    <title> لوحة التحكم | IPORH</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{panel_url('login/images/icons/favicon.ico')}}"/>
    {!! HTML::style(panel_url('login/vendor/bootstrap/css/bootstrap.min.css')) !!}
    {!! HTML::style(panel_url('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')) !!}
    {!! HTML::style(panel_url('login/vendor/animate/animate.css')) !!}
    {!! HTML::style(panel_url('login/vendor/css-hamburgers/hamburgers.min.css')) !!}
    {!! HTML::style(panel_url('login/vendor/select2/select2.min.css')) !!}
    {!! HTML::style(panel_url('login/css/util.css')) !!}
    {!! HTML::style(panel_url('login/css/main.css')) !!}
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{panel_url('login/images/img-01.png')}}" alt="IMG">
            </div>

            {!! Form::open(['method'=>'POST','url'=>lang_route('panel.login'),'class'=>'login100-form validate-form']) !!}
            <span class="login100-form-title">تسجيل الدخول</span>
            @if(session()->has('response'))
                <div class="alert alert-danger">
                  <span class="text-center" style="margin-left: 35px;">  {{session()->get('response')}} </span>
                </div>
            @endif
            <div class="wrap-input100 validate-input" data-validate="الرجاء أدخل بريد إلكتروني صحيح">
                <input class="input100" type="text" name="email" placeholder="البريد الإلكتروني">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="كلمة المرور مطلوبة">
                <input class="input100" type="password" name="password" placeholder="كلمة المرور">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    تسجيل الدخول
                </button>
            </div>


            <div class="text-center p-t-136">
                <div class="text-center p-t-12">
                    <a class="txt2" href="#">
                        itOnline
                    </a>
                    <span class="txt1">
							جميع الحقوق محفوظة لشركة
					</span>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

{!! HTML::script(panel_url('login/vendor/jquery/jquery-3.2.1.min.js')) !!}
{!! HTML::script(panel_url('login/vendor/bootstrap/js/popper.js')) !!}
{!! HTML::script(panel_url('login/vendor/bootstrap/js/bootstrap.min.js')) !!}
{!! HTML::script(panel_url('login/vendor/select2/select2.min.js')) !!}
{!! HTML::script(panel_url('login/vendor/tilt/tilt.jquery.min.js')) !!}
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
{!! HTML::script(panel_url('login/js/main.js')) !!}
</body>
</html>