<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\customer;

use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class ExcelController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        $month=Carbon::now()->format('m');
       
        $orders = customer::all()->where('state',1);
        foreach ($orders as $row) {
            $order[] = array(
                '0' => $row->id,
                '1' => $row->full_name,
                '2' => $row->email,
                '3' => $row->phone,
                '4' => $row->address,  
                '5' => $row->created_at              
            );
        }

        return (collect($order));
    }

    public function headings(): array
    {
        return [
            'id',
            'Tên',           
            'Email',
            'Sđt',
            'Địa chỉ',
            'Ngày đặt hàng',            
        ];
    }

    public function export(){
        return Excel::download(new ExcelController(), 'Doanh thu.xlsx');
   }
}
