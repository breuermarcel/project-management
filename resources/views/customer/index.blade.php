@extends('project-management::main')

@section('content')
    <h1>{{ trans("Customers") }}</h1>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ trans("Salutation") }}</th>
                <th scope="col">{{ trans("First Name") }}</th>
                <th scope="col">{{ trans("Last name") }}</th>
                <th scope="col">{{ trans("Email") }}</th>
                <th scope="col">{{ trans("Mobile Number") }}</th>
                <th scope="col">{{ trans("Company") }}</th>
                <th scope="col">{{ trans("Street") }}</th>
                <th scope="col">{{ trans("Location") }}</th>
                <th scope="col">{{ trans("Country") }}</th>
                <th scope="col">{{ trans("Tax Number") }}</th>
            </tr>
            </thead>
            <tbody>

            @foreach($customers as $customer)
                <tr>
                    <th scope="row">{{ $customer->id }}</th>
                    <td>{{ $customer->salutation }}</td>
                    <td>{{ $customer->firstname }}</td>
                    <td>{{ $customer->lastname }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->mobile_number }}</td>
                    <td>{{ $customer->company_name }}</td>
                    <td>{{ $customer->street }}</td>
                    <td>{{ $customer->location }}</td>
                    <td>{{ $customer->country }}</td>
                    <td>{{ $customer->tax_number }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
