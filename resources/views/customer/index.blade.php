@extends('project-management::main')

@section('content')
    <div class="row g-3">
        <div class="col-12">
            <h1>{{ trans("Customers") }}</h1>
        </div>

        <div class="col-12">
            <div class="btn-group ms-auto">
                <a href="{{ route("customers.create") }}" class="btn btn-dark">{{ trans("Create") }}</a>
            </div>
        </div>

        <div class="col-12">
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
                        <th scope="col"><span class="visually-hidden">{{ trans("Tools") }}</span></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($customers as $customer)
                        <tr>
                            <th scope="row">{{ $customer->id }}</th>
                            <td>{{ $customer->salutation }}</td>
                            <td>{{ $customer->firstname }}</td>
                            <td>{{ $customer->lastname }}</td>
                            <td><a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a></td>
                            <td><a href="tel:{{ $customer->mobile_number }}">{{ $customer->mobile_number }}</a></td>
                            <td>{{ $customer->company_name }}</td>
                            <td>{{ $customer->street }}</td>
                            <td>{{ $customer->location }}</td>
                            <td>{{ $customer->country }}</td>
                            <td>{{ $customer->tax_number }}</td>
                            <td>
                                <a href="{{ route("customers.edit", $customer) }}" target="_self" class="btn btn-dark">
                                    {{ trans("Edit") }}
                                </a>
                                <form class="d-inline" action="{{ route("customers.destroy", $customer) }}" method="POST">
                                    @method("DELETE")
                                    @csrf

                                    <button class="btn btn-dark" type="submit">{{ trans("Delete") }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
