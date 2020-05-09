<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản trị - Store</title>
    <base href="{{ asset('backend') }}/">
	<!-- css -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--Icons-->
	<script src="js/lumino.glyphs.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
	
	<!-- header -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> @if(session('email')) {{ session('email') }} @endif <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu"><li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Thông tin</a></li>
						<li><a href="/admin/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<!-- header -->
	<!-- sidebar left-->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
		</form>
        <ul class="nav menu">
			<li class="active"><a href="/admin"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Tổng quan</a></li>
			<li><a href="/admin/category"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper" /></svg> Danh Mục</a></li>
			<li><a href="/admin/product"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Sản phẩm</a></li>
			<li><a href="/admin/order"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad" /></svg> Đơn hàng</a></li>
			{{-- <li><a href="/admin/banner"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Banner</a></li> --}}
			<li><a href="/admin/adv"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg> Quảng cáo</a></li>
			<li role="presentation" class="divider"></li>
			@if (auth()->user()->level == 2)
			<li><a href="/admin/user"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Quản lý thành viên</a></li>
			@endif
		</ul>

	</div>
	<!--/. end sidebar left-->

	<!--main-->
	@yield('content')
	<!--end main-->

	<!-- javascript -->
	@section('script')
    <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	@yield('data')
	{{-- <script src="js/chart-data.js"></script> --}}
    @show

</body>

</html>