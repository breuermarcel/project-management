@extends('project-management::main')

@section("heading")
    <h1>{{ trans("Dashboard") }}</h1>
@endsection

@section('content')
    <div class="row row-cols-1 row-cols-md-2 g-3">
        <div class="col">
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

        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2>{{ trans("Open time tracking")}}:</h2>
                </div>

                <div class="card-body">
                    @foreach($openTimeTrackings as $tracking)
                        <p>{{ $tracking->task->name }}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2>{{ trans("KPI's")}}:</h2>
                </div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

@endsection
