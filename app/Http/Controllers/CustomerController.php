<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\StoreCustomer;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;
use App\Filters\Customer\CustomerFilters;
use App\Notifications\CustomerNoti;
use App\User;
use Illuminate\Support\Facades\Notification;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $customers=Customer::filter($filters)->paginate(10);
        $customers = Customer::orderBy('id','desc')->get();
        return view('customers.index', ['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country_flags = Countries::all()->sortBy('name.common')->pluck('flag.emoji', 'name.common');

        return view('customers.create',[
            'country_flags'=>$country_flags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomer $request)
    {
        $validated = $request->validated();
        $customer = auth()->user()->customers()->create($validated);

        $users=User::all()->except(auth()->id());
        $new = $customer;
        Notification::send($users, new CustomerNoti($users,$new));
        
        return view('customers.index',['customers'=> Customer::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show',[
            'customer'=>$customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $country_flags = Countries::all()->sortBy('name.common')->pluck('flag.emoji', 'name.common');
        return view('customers.edit', [
            'customer'=>$customer,
            'country_flags'=>$country_flags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCustomer $request, Customer $customer)
    {
        $validated = $request->validated();
        $customer->update($validated);

        return view('customers.show',[
            'customer'=>$customer
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return back();
    }

    public function readmore(Customer $customer)
    {
        return response()->json([
            'data'=>view('customers.readmore', [
                'customer'=>$customer
            ])->render()
        ]);
    }
}
