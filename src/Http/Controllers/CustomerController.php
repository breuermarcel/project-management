<?php

namespace Breuermarcel\ProjectManagement\Http\Controllers;

use Breuermarcel\ProjectManagement\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::simplePaginate(15);

        return view("project-management::customer.index", compact("customers"));
    }

    public function create()
    {
        return view("project-management::customer.create");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'salutation' => 'max:255',
            'firstname' => 'max:255',
            'lastname' => 'max:255',
            'company_name' => 'max:255',
            'tax_number' => 'max:255',
            'street' => 'max:255',
            'location' => 'max:255',
            'country' => 'max:255',
            'mobile_number' => 'max:255',
            'email' => 'max:255'
        ]);

        if ($validator->fails()) {
            return redirect(route("customer.create"))
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        Customer::create($validated);
    }
}
