@extends('project-management::main')

@section("heading")
    <h1>{{ trans("Edit Customer") }}</h1>

    <div class="btn-group ms-auto">
        <a href="{{ route("customers.index") }}" target="_self" class="btn btn-dark ms-auto">{{ trans("List") }}</a>
        <a href="{{ route("customers.create") }}" target="_self" class="btn btn-dark">{{ trans("Create") }}</a>
    </div>
@endsection

@section('content')
    <form class="row g-2" method="POST" action="{{ route("customers.update", $customer) }}">
        @method("PATCH")
        @csrf

        <div class="col-md-2">
            <div class="form-floating">
                <select class="form-select @error('salutation') is-invalid @enderror" id="salutation" name="salutation">
                    <option {{ $customer->salutation ? "disabled" : "" }}>{{ trans("Choose...") }}</option>

                    @foreach($customer->salutations as $key => $salutation)
                        <option
                            value="{{ $key }}" {{ $customer->salutation !== $key ?: "selected" }}>{{ trans($customer->readableSalutation($key)) }}</option>
                    @endforeach
                </select>
                <label for="salutation">{{ trans("Salutation") }}</label>

                @error("salutation")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-5 form-floating">
            <div class="form-floating">
                <input type="text" placeholder="{{ trans('Firstname') }}"
                       class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname"
                       value="{{ $customer->firstname}}">
                <label for="lastname">{{ trans("Firstname") }}</label>

                @error("firstname")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-floating">
                <input type="text" placeholder="{{ trans('Lastname') }}"
                       class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname"
                       value="{{ $customer->lastname}}">
                <label for="lastname">{{ trans("Lastname") }}</label>

                @error("lastname")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" placeholder="{{ trans('Mobile Number') }}"
                       class="form-control @error('mobile_number') is-invalid @enderror" id="mobile_number"
                       name="mobile_number" value="{{ $customer->mobile_number}}">
                <label for="mobile_number">{{ trans("Mobile Number") }}</label>

                @error("mobile_number")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <input type="email" placeholder="{{ trans('Email') }}"
                       class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                       value="{{ $customer->email}}">
                <label for="email">{{ trans("Email") }}</label>

                @error("email")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <hr/>
        </div>

        <div class="col-md-7">
            <div class="form-floating">
                <input type="text" placeholder="{{ trans('Company') }}"
                       class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                       name="company_name" value="{{ $customer->company_name}}">
                <label for="company_name">{{ trans("Company") }}</label>

                @error("company_name")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-floating">
                <input type="text" placeholder="{{ trans('Tax Number') }}"
                       class="form-control @error('tax_number') is-invalid @enderror" id="tax_number" name="tax_number"
                       value="{{ $customer->tax_number}}">
                <label for="tax_number">{{ trans("Tax Number") }}</label>

                @error("tax_number")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <hr/>
        </div>

        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" placeholder="{{ trans('Street') }}"
                       class="form-control @error('street') is-invalid @enderror" id="street" name="street"
                       value="{{ $customer->street}}">
                <label for="street">{{ trans("Street") }}</label>

                @error("street")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" placeholder="{{ trans('Location') }}"
                       class="form-control @error('location') is-invalid @enderror" id="location" name="location"
                       value="{{ $customer->location}}">
                <label for="location">{{ trans("Location") }}</label>

                @error("location")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" placeholder="{{ trans('Country') }}"
                       class="form-control @error('country') is-invalid @enderror" id="country" name="country"
                       value="{{ $customer->country}}">
                <label for="country">{{ trans("Country") }}</label>

                @error("country")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <hr/>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-dark">{{ trans("Update") }}</button>
        </div>
    </form>

@endsection
