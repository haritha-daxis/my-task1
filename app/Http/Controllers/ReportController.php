<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\sale;
use App\Models\Customer;
use Response;
use Validator;

class ReportController extends Controller
{
public function index()
{
    return view('report.report');
}
        public function salesReport()
        {
           // $data=sale::get();
            // return $data;
            $sale=sale::all();
        // $bs=[];
        // foreach($sale as $s){
            $data=customer::join('sales','sales.customer_id','=','customer.id')->select('sales.id','customer.customer_name','customer.customer_email')->orderBy('sales.id')->get();
        // }
        // $bs=$customer->toArray();
        return Response::json(array('success'=>true,'res'=>$data));
    }
          //  return Response()->json($data);

        public function customerReport()
        {
            $data=customer::get();
            return $data;
        }
        public function categoryReport()
        {
            $data=Category::get();
            return $data;
        }
        public function productReport()
        {
            $data=product::get();
            return $data;
        }
    }

