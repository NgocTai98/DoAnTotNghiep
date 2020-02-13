@extends('backend.master.master')
@section('title','Sửa giá trị thuộc tính')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Danh mục/Thuộc tính/Sửa giá trị của tính</li>
		</ol>
	</div>
	<!--/.row-->


	<!--/.row-->
	<div class="row col-md-offset-3 ">
		<div class="col-md-6">	
		<div class="panel panel-blue">
			<div class="panel-heading dark-overlay">Sửa giá trị của tính</div>
			<div class="panel-body">
				@if ($errors->has('edit_value'))
					<div class="alert alert-danger" role="alert">
					<strong>{{ $errors->first('edit_value') }}</strong>
					</div>
				@endif
				<form action="" method="post">@csrf
				<div class="form-group">
				  <label for="">Tên giá trị của thuộc tính</label>
				<input type="text" name="edit_value" id="" class="form-control" value="{{ $value->value }}" placeholder="" aria-describedby="helpId">
			
				</div>
				<div  align="right"><button class="btn btn-success" type="submit">Sửa</button></div>
			</form>
			</div>
		</div>
										
		</div>
		<!--/.col-->
	</div>
	<!--/.row-->
</div>
@endsection