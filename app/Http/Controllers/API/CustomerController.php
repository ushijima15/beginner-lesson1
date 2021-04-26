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
use App\User;

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


            $customer = new Customer;
            $customer->first_name = $request->customer['first_name'];
            $customer->last_name = $request->customer['last_name'];
            $customer->first_phonetic_name = $request->customer['first_phonetic_name'];
            $customer->last_phonetic_name = $request->customer['last_phonetic_name'];
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
        $count = User::where([
            ['id', '<>', $customer->user_id],
            ['name', $request->customer['user_name']]
        ])->count();
        if ($count) {
            return response()->json([
                'result' => false,
                'errorMessage' => 'ユーザIDは既に登録されています。'
            ]);
        }
        
        DB::transaction(function () use ($request, $customer) {
            $user = $customer->user;
            if (!isset($user)) $user = new User;
            $user->name =  $request->customer['user_name'];
            // $user->email = $request->employee['email'] ?: '';
            if (array_key_exists('password', $request->customer) && $request->customer['password']) {
                $user->password = bcrypt($request->customer['password']);
            }
            $user->save();
            $customer->user_id = $user->id;
            
            $customer->first_name = $request->customer['first_name'];
            $customer->last_name = $request->customer['last_name'];
            $customer->first_phonetic_name = $request->customer['first_phonetic_name'];
            $customer->last_phonetic_name = $request->customer['last_phonetic_name'];
            
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

            $customer->user->delete();
            
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

    /**
     * フルネーム＠検索用
     *
     * @return \Illuminate\Http\Response
     */
    public function fullname()
    {
        $customers = Customer::all();
        return CustomerForSelectorResource::collection($customers);
    }
}