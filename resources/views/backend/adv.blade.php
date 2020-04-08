@extends('backend.master.master')   
@section('title', 'Quảng cáo')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <h3>Gửi email để tiếp cận khách hàng</h3>
    <div class="form-group">
        <form action="/admin/adv" method="post"> @csrf
            <textarea class="form-control" name="email" id="" cols="30" rows="10" placeholder="Nhập nội dụng email cần gửi"></textarea>
            <button type="submit" class="btn btn-primary" style="margin-top: 10px; float: right">Gửi</button>
        </form>
    </div>
</div>
@endsection