@extends('project-management::main')

@section("heading")
    <h1>{{ trans("Create Project") }}</h1>

    <div class="btn-group ms-auto">
        <a href="{{ route("projects.index") }}" target="_self" class="btn btn-dark">{{ trans("List") }}</a>
    </div>
@endsection

@section('content')
    <form class="row g-2" method="POST" action="{{ route("projects.store") }}">
        @method("POST")
        @csrf

        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" placeholder="{{ trans('Name') }}"
                       class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       value="{{ old("name") }}" required>
                <label for="name">{{ trans("Name") }}</label>

                @error("name")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <select class="form-select @error('customer_id') is-invalid @enderror" id="customer_id"
                        name="customer_id">
                    <option selected disabled>{{ trans("Choose...") }}</option>

                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->lastname }} ({{ $customer->company_name }})
                        </option>
                    @endforeach
                </select>
                <label for="customer_id">{{ trans("Customer") }}</label>

                @error("customer_id")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating">
                <textarea type="text" placeholder="{{ trans('Description') }}"
                          class="form-control @error('description') is-invalid @enderror" id="description"
                          name="description" style="height: 250px">{{ old("description") }}</textarea>
                <label for="description">{{ trans("Description") }}</label>

                @error("description")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-dark text-end">{{ trans("Create") }}</button>
        </div>
    </form>
@endsection
