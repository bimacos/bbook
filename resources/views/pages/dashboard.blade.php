@extends('layouts.template')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
		<div class="container">	
			<div class="row">
				<div class="col-md-1"></div>
			<div class="col-md-11">
				<div class="card">
  					<br>
  						<h1 style="color:#2b90d9 ;" align="center">Welcome Da'best</h1>
  						<img src="{{asset('img/guestbook.jpg')}}" alt="" style="width: 100%;  height: 600px;">
  						<p class="text-center" style="margin-top: 110px;">&copy; CopyRight 2018 <span style="color: #2b90d9">The Best</span> Powered By <span style="color: #2b90d9">Muhammad Fikri Bima Nugraha</span></p>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>

@endsection
