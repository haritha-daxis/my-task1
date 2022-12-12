<?php
namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
class customerCRUDController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$data['customer'] = Customer::orderBy('id','desc')->paginate(5);
return view('customers.index', $data);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('customers.create');
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$request->validate([
'name' => 'required',
'dob' => 'required',
'email' => 'required'

]);
$customer = new Customer;
$customer->customer_name = $request->name;
$customer->customer_dob = $request->dob;
$customer->customer_email = $request->email;

$customer->save();

return redirect()->route('customers.index')
->with('success','Customer has been created successfully.');
}
/**
* Display the specified resource.
*
* @param  \App\customer  $customer
* @return \Illuminate\Http\Response
*/
public function show(Customer $customer)
{
return view('customers.show',compact('customer'));
}
/**
* Show the form for editing the specified resource.
*
* @param  \App\Customer  $company
* @return \Illuminate\Http\Response
*/
public function edit(Customer $customer)
{
return view('customers.edit',compact('customer'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\company  $company
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$request->validate([
'customer_name' => 'required',
'customer_dob' => 'required',
'customer_email' => 'required'

]);
$customer = Customer::find($id);
$customer->customer_name = $request->name;
$customer->customer_dob = $request->dob;
$customer->customer_email = $request->email;

$customer->save();
return redirect()->route('customers.index')
->with('success','Customer Has Been updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  \App\Customer  $customer
* @return \Illuminate\Http\Response
*/
public function destroy(customer $customer)
{
$company->delete();
return redirect()->route('customers.index')
->with('success' ,'customer has been deleted successfully');
}
}