<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
// use App\models\members;
use App\models\customer;
use App\models\members;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getIndex(){
        $year_n=Carbon::now()->format('Y');
        $month_n=Carbon::now()->format('m');
        for($i=1;$i<=$month_n;$i++)
        {
           $monthjs[$i]='Tháng '.$i;
           $numberjs[$i]=customer::where('state',1)->whereMonth('updated_at',$i)->whereYear('updated_at', $year_n)->sum('total');
        }
        $data['monthjs']=$monthjs;
        $data['numberjs']=$numberjs;
        $data['order']=customer::where('state',1)->whereMonth('updated_at',$month_n)->whereYear('updated_at', $year_n)->count();
        $data['adv']=members::count();
        // $data['user'] = Auth::user();
        
         return view('backend.index',$data);
    }
    
}
