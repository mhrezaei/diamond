<!DOCTYPE html>
<html lang="fa">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<title>@yield('page_title')</title>

	{!! Html::style('assets/css/front.min.css') !!}
</head>


<body>
	@include('front.layouts.topbar')
	@include('front.layouts.navbar')
	@yield('content')
	@include('front.layouts.footer')
	<div class="overlay"></div>

	{{--
	|--------------------------------------------------------------------------
	| Load Scripts
	|--------------------------------------------------------------------------
	|
	--}}
	{!! Html::script('assets/libs/jquery.min.js') !!}
	{!! Html::script('assets/js/app.js') !!}


{{--<script src="js/jquery.js"></script>--}}
</body>

</html>