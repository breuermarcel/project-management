@extends('project-management::main')

@section("heading")
    <h1>{{ trans("Dashboard") }}</h1>
@endsection

@section('content')
    <div class="row g-3">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ trans("Todos")}}:</h2>
                </div>

                <div class="card-body">
                    @foreach($openTasks as $task)
                        <p>{{ $task->name }}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ trans("Open time tracking")}}:</h2>
                </div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

@endsection
