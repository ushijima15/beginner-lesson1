<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerForList as CustomerForListResource;
use App\Http\Resources\CustomerForShow as CustomerForShowResource;
use App\Http\Resources\CustomerSelector as CustomerSelectorResource;
use App\Http\Resources\CustomerForSelector as CustomerForSelectorResource;
use App\Customer;

class CustomerController extends Controller
{
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return CustomerForListResource::collection($customers);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        DB::transaction(function () use ($request) {


            $customer= new Customer;
            $customer->save();
            $customer->code = $request->customer['code'];
            $customer->name = $request->customer['name'];
            $customer->postal_code = $request->customer['postal_code'];
            $customer->tel = $request->customer['tel'];
            $customer->fax = $request->customer['fax'];
            $customer->closing_day = $request->customer['closing_day'];
            $customer->address = $request->customer['address'];
            // $user->email = $request->employee['email'] ?: '';

            
            $customer->save();
        });

        return response()->json([
            'result' => true,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return new CustomerForShowResource($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $count = Customer::where([
            ['id', '<>', $customer->id],
            ['code', $request->customer['code']]
        ])->count();
        if ($count) {
            return response()->json([
                'result' => false,
                'errorMessage' => '顧客コードは既に登録されています。'
            ]);
        }
        
        DB::transaction(function () use ($request, $customer) {
            $customer->code = $request->customer['code'];
            $customer->name = $request->customer['name'];
            $customer->postal_code = $request->customer['postal_code'];
            $customer->tel = $request->customer['tel'];
            $customer->fax = $request->customer['fax'];
            $customer->closing_day = $request->customer['closing_day'];
            $customer->address = $request->customer['address'];
            $customer->save();
        });

        return response()->json([
            'result' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        DB::transaction(function () use ($customer) {
            $customer->delete();            
        });

        return response()->json([
            'result' => true,
        ]);
    }

    /**
     * セレクトボックス用
     *
     * @return \Illuminate\Http\Response
     */
    public function selector()
    {
        $customers = Customer::all();
        return CustomerSelectorResource::collection($customers);
    }

}