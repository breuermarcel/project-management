@extends('project-management::main')

@section("heading")
    <h1>{{ trans("Update Task") }}</h1>

    <div class="ms-auto btn-group">
        <a href="{{ route("projects.show", $project) }}" target="_self"
           class="btn btn-dark">{{ trans("Show Project") }}</a>
        <a href="{{ route("tasks.create", $project) }}" target="_self"
           class="btn btn-dark">{{ trans("Create Task") }}</a>
    </div>
@endsection

@section('content')
    <form class="row g-2" method="POST" action="{{ route("tasks.update", [$project, $task]) }}">
        @method("PATCH")
        @csrf

        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" placeholder="{{ trans('Name') }}"
                       class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       value="{{ $task->name }}" required>
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
                        name="status">
                    <option disabled>{{ trans("Choose...") }}</option>

                    @foreach($task->statuses as $id => $status)
                        <option
                            value="{{ $id }}" {{ $task["status"] !== $id ?: "selected" }}>{{ ucwords(trans($status)) }}</option>
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

        <div class="col-12">
            <div class="form-floating">
                <textarea type="text" placeholder="{{ trans('Description') }}"
                          class="form-control @error('description') is-invalid @enderror" id="description"
                          name="description" style="height: 250px">{{ $task->description }}</textarea>
                <label for="description">{{ trans("Description") }}</label>

                @error("description")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" placeholder="{{ trans('Expenditure (hours)') }}"
                       class="form-control @error('expenditure') is-invalid @enderror" id="expenditure"
                       name="expenditure"
                       value="{{ $task->expenditure }}">
                <label for="expenditure">{{ trans("Expenditure (hours)") }}</label>

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
                       value="{{ $task->deadline === null ?: $task->deadline->format("Y-m-d") }}">
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
                    <option disabled>{{ trans("Choose...") }}</option>

                    @foreach($users as $user)
                        <option
                            value="{{ $user->id }}" {{ $task->signed_user_id !== $user->id ?: "selected" }}>{{ $user->name }}</option>
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
            <button class="btn btn-dark" type="submit">{{ trans("Update") }}</button>
        </div>

    </form>
@endsection
