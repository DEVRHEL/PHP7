<!DOCTYPE html>
<head>
<html lang="en">
	<meta charset="UTF-8">
	<title>Blade Template</title>
	<link rel="stylesheet" href="{{ asset('public/css/mystyle.css') }}"></link>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			@include('blade.marquee',['vall'=>'Lap trinh Laravel'])
			@section('vitri')
				OK
			@show
		</div>
		<div id="content">
			@yield('noidung')
		</div>
		<div id="footer"></div>
	</div>
</body>
</html>