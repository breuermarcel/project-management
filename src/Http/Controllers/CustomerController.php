<?php

namespace Breuermarcel\ProjectManagement\Http\Controllers;

use Breuermarcel\ProjectManagement\Models\Customer;
use Cassandra\Custom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::simplePaginate(15);

        return view("project-management::customer.index", compact("customers"));
    }

    public function create()
    {
        $customer = new Customer();

        return view("project-management::customer.create", compact("customer"));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "salutation" => "nullable|integer|between:0,2",
            "firstname" => "nullable|max:255",
            "lastname" => "nullable|max:255",
            "company_name" => "required|max:255",
            "tax_number" => "nullable|max:255",
            "street" => "nullable|max:255",
            "location" => "nullable|max:255",
            "country" => "nullable|max:255",
            "mobile_number" => "nullable|max:255",
            "email" => "required|max:255|unique:bm_customers"
        ]);

        if ($validator->fails()) {
            return redirect(route("customers.create"))->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        Customer::create($validated);

        return redirect(route("customers.index"))->withSuccess(trans("Customer created."));
    }

    public function edit(Customer $customer)
    {
        return view("project-management::customer.edit", compact("customer"));
    }

    public function update(Customer $customer, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "salutation" => "nullable|integer|between:0,2",
            "firstname" => "nullable|max:255",
            "lastname" => "nullable|max:255",
            "company_name" => "required|max:255",
            "tax_number" => "nullable|max:255",
            "street" => "nullable|max:255",
            "location" => "nullable|max:255",
            "country" => "nullable|max:255",
            "mobile_number" => "nullable|max:255",
            "email" => "required|max:255|unique:bm_customers,email," . $customer->id
        ]);

        if ($validator->fails()) {
            return redirect(route("customers.edit", $customer))->withErrors($validator);
        }

        $validated = $validator->validated();

        $customer->update($validated);

        return redirect(route("customers.index"))->withSuccess(trans("Customer updated."));
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect(route("customers.index"))->withSuccess(trans("Customer deleted."));
    }
}
