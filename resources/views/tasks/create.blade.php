@extends('project-management::main')

@section("heading")
    <h1>{{ trans("Create Task") }}</h1>

    <div class="ms-auto btn-group">
        <a href="#" target="_self" class="btn btn-dark">{{ trans("List") }}</a>
    </div>
@endsection

@section('content')
    <form class="row g-2" method="POST" action="{{ route("tasks.store", $project) }}">
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
                <select class="form-select @error('status') is-invalid @enderror" id="status"
                        name="status" required>
                    <option selected disabled>{{ trans("Choose...") }}</option>
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}">{{ ucwords(trans($status)) }}</option>
                    @endforeach

                </select>
                <label for="status">{{ trans("Status") }}</label>

                @error("status")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" placeholder="{{ trans('Expenditure') }}"
                       class="form-control @error('expenditure') is-invalid @enderror" id="expenditure" name="expenditure"
                       value="{{ old("expenditure") }}">
                <label for="expenditure">{{ trans("Expenditure") }}</label>

                @error("expenditure")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <input type="date" placeholder="{{ trans('Deadline') }}"
                       class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline"
                       value="{{ old("deadline") }}">
                <label for="deadline">{{ trans("Deadline") }}</label>

                @error("deadline")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <select class="form-select @error('signed_user_id') is-invalid @enderror" id="signed_user_id"
                        name="signed_user_id">
                    <option selected disabled>{{ trans("Choose...") }}</option>

                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <label for="signed_user_id">{{ trans("Responsible Person") }}</label>

                @error("signed_user_id")
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
            <button class="btn btn-dark" type="submit">{{ trans("Create") }}</button>
        </div>

    </form>
@endsection
