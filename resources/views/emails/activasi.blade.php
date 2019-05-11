@extends('layout.email')

@section('content')
	<h2 style="font-weight: 400; margin-top: 0;">Hi, {{ $name }}</h2>
	@if(isset($activation_code))
        <p style="">Thanks for registering . To start with the Helpdesk Applications, simply just click the green button below to verify your email address.</p>
    @else
    	<p style="">Thanks for use this apps . To log in to the application, please use the password below.</p>
    @endif
@endsection
