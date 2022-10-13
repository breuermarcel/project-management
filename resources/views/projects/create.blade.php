@extends('project-management::main')

@section('content')
    <h1>{{ trans("Project") }}</h1>

    <form class="row g-2" method="POST" action="{{ route("projects.store") }}">
        @method("POST")
        @csrf

        <div class="col-12">
            <div class="form-floating">

            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-dark">{{ trans("Create") }}</button>
        </div>
    </form>
@endsection
