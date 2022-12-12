<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Response;
use App\Models\sale;

class SalesController extends Controller {
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $sales = sale::all();
        return view('sales.index')->with(compact('sales'));
    }
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
{
        $data = $request->validate([
            'sales_item' => 'required|max:500',
            'sales_qty' => 'required',
            'customer_id'=>'required'
        ]);

        $sales = sales::create($data);
        return Response::json($sales);
    }
}
