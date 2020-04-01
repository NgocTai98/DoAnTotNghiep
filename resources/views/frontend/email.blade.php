<div style="width: 80%;margin-left: 100px">
    <div style="margin-bottom: 30px">
        <h3 align="center" style="text-transform: uppercase; color: green">Thông tin đơn hàng</h3>
        <p style="font-weight: bold">TÊN KHÁCH HÀNG:    {{ $data['name'] }} </p> 
        <p style="font-weight: bold">SĐT:   {{ $data['phone'] }}</p>
        <p style="font-weight: bold">EMAIL:    {{ $data['email'] }}</p>
        <p style="font-weight: bold">ĐỊA CHỈ:   {{ $data['address'] }}</p> 
    </div>
    <table style="width: 100%;" >
        <thead style="background-color: cornflowerblue;">
            <tr>
                <th>Mã Sản phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Đơn Giá</th>
                <th>Thành Tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['product'] as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{ $item->name }} </td>
                <td>{{ $item->qty}} </td>
                <td>{{ number_format($item->price)}} VNĐ</td>
                <td>{{ number_format(($item->price)*($item->qty))}} VNĐ</td>
            </tr>
            @endforeach
           
            
    
            <tr style="font-size: 30px; font-weight: bold; color: red;">
                <td >Tổng tiền</td>
                <td  colspan="4" align="right">{{ $data['total'] }} </td>
            </tr>
          
        </tbody>
    </table>
    <p align="center" style="font-weight: bold;">Cảm ơn bạn đã mua hàng </p>
    
    
</div>