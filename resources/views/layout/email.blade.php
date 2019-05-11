<!-- layout.html -->
<!DOCTYPE html>
<!--[if lt IE 7]>      
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> 
<![endif]-->
<!--[if IE 7]>         
<html class="no-js lt-ie9 lt-ie8" lang=""> 
<![endif]-->
<!--[if IE 8]>         
<html class="no-js lt-ie9" lang=""> 
<![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{{ env('TITLE_EMAIL', 'Activation Account') }}}</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">	
  <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet"> 
</head>

<body style="margin: 0 auto;display: block; padding: 0; font-family: 'Rubik', sans-serif; font-size: 13px;background: #f9f9f9;">
  <style type="text/css"></style>
  <table style="max-width: 600px; margin: 0 auto; padding: 40px">
    <tr>
      <td style="width: 100%; padding: 30px 0px 0;">
        <!-- <a href=""><img src="https://preview.ibb.co/n2Kq1p/logo.png" style="width: 220px; display: block; margin: 0 auto;"></a> -->
        <br>        
      </td>
    </tr>


    <tr style="background: url(@yield('urlHeader','https://image.ibb.co/dxszu9/ilus1.jpg'))no-repeat center; margin-top: 20px; border-radius: 5px;display: inline-block; width: 100%; border-bottom-left-radius: 0;border-bottom-right-radius: 0;">
      <!-- <td style="width: 100%; padding: 30px 30px; text-align: center; height: 150px;"></td> -->
       <td style="display: block; padding: 30px 30px; text-align: center; height: 150px; position: relative;">
      </td>
    </tr>
    <tr style="background: white; border:1px solid #f3f3f3; margin-top: 0; border-radius: 5px;display: inline-block;border-top-left-radius: 0;border-top-right-radius: 0;display: block;">
      <td style="display: block; padding: 30px 30px; text-align: center;">
    
      @yield('content')

       @if (isset($activation_code))
        <a href="{{ env('ACTIVATIONS_URL', 'http://localhost:8000/api/v1/eks/activation/') }}{{ $activation_code }}" style="padding: 10px 45px; background: #78db86; color: white; border-radius: 50px; margin-top: 10px; display: inline-block; text-decoration: none; "  class="button" target="_blank" ><b> Activation Account</b></a>
       @else
        <p href="#" style="padding: 10px 45px; background: #78db86; color: white; border-radius: 50px; margin-top: 10px; display: inline-block;" class="button"><b> {{ $password }}</b></p>
       @endif


      <hr style="width: 100%; height: 1px; background: #e1e1e1; border: none; margin: 20px 0;">
        
        <p style="margin-bottom: 5px; opacity: 0.5; display: block; clear: both; margin-top: 0px;">If you have questions regarding  , please call us at <br>
        </p>
        <p style="margin-bottom: 0px; opacity: 0.5; display: block; clear: both; margin-top: 0px;">Email:   <a href="#" style="margin-right: 8px;margin-left: 3px;">{{ env('EMAIL_SUPPORT', 'support@apps.com') }}</a></p>
        <p style="margin-bottom: 30px; opacity: 0.5; display: block; clear: both; margin-top: 0px;">Call center:   <a href="#" style="margin: 0;margin-left: 3px;">+6222 899102</a></p>

        <p style="opacity: 0.5; margin-bottom: 0px;">Best Regards,<br>{{ env('PROJECT_NAME', 'Helpdesk Maintenance') }} Project<br><i>"Lets make a better work together"</i></p>
      </td>
    </tr>

    <tr>
      <td style="width: 100%; padding: 0px 0px 30px; margin-top: 10px;display: inline-block; text-align: center;">
        <span style="float: right;display: block;">
          <a href="#" style="padding: 10px 0px; color: #78db86; border-radius: 50px; margin-top: 0px; display: inline-block; text-decoration: underline; margin-right: 10px; margin-bottom: 8px; " ><img src="https://image.ibb.co/mC9ZSU/s_fb.png" style="width: 30px;"></a>
          <a href="#" style="padding: 10px 0px; color: #78db86; border-radius: 50px; margin-top: 0px; display: inline-block; text-decoration: underline; margin-right: 10px; margin-bottom: 8px; " ><img src="https://image.ibb.co/h919u9/s_twt.png" style="width: 30px;"></a>
          <a href="#" style="padding: 10px 0px; color: #78db86; border-radius: 50px; margin-top: 0px; display: inline-block; text-decoration: underline; margin-right: 0px; margin-bottom: 8px; " ><img src="https://image.ibb.co/j8wsE9/s_ig.png" style="width: 30px;"></a>
        </span>
        <p style="margin-bottom: 0px; opacity: 0.5; float: right ;padding-top: 5px;margin-right: 20px;">Follow us on</p>
      </td>
    </tr>
  </table>

</body>

</html>