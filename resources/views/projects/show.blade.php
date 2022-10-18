@extends('project-management::main')

@section("heading")
    <h1>{{ $project->name }}</h1>
    <small class="ps-2">({{ $project->customer->company_name }})</small>

    <div class="btn-group ms-auto">
        <a href="{{ route("projects.index") }}" target="_self" class="btn btn-dark">{{ trans("List") }}</a>
        <a href="{{ route("projects.edit", $project) }}" target="_self" class="btn btn-dark">{{ trans("Edit") }}</a>
        <a href="{{ route("tasks.create", $project) }}" target="_self" class="btn btn-dark">{{ trans("Add Task") }}</a>
    </div>
@endsection

@section('content')
    <div id="bm__project_description">
        {{ $project->description }}
    </div>

    <div id="bm__project_tasks">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ trans("Name") }}</th>
                    <th scope="col">{{ trans("Description") }}</th>
                    <th scope="col">{{ trans("Status") }}</th>
                    <th scope="col">{{ trans("Deadline") }}</th>
                    <th scope="col">{{ trans("Expenditure") }}</th>
                    <th scope="col">{{ trans("Signed to") }}</th>
                    <th scope="col">{{ trans("Created by") }}</th>
                    <th scope="col"><span class="visually-hidden">{{ trans("Tools") }}</span></th>
                </tr>
                </thead>
                <tbody>

                @foreach($project->tasks as $task)
                    <tr>
                        <th scope="row">{{ $task->id }}</th>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            {{ ucwords(trans($task->readableStatus($task["status"]))) }}
                        </td>
                        <td>{{ $task->deadline !== null ? $task->deadline->format("d.m.Y") : "-" }}</td>
                        <td>{{ $task->expenditure }}</td>
                        <td>
                            {{ $task->signedTo !== null ? $task->signedTo->name : "-" }}
                        </td>
                        <td>{{ $task->createdFrom->name }}</td>
                        <td>
                            <a href="{{ route("tasks.edit", [$project, $task]) }}" target="_self" class="btn btn-dark">
                                {{ trans("Edit") }}
                            </a>
                            <form class="d-inline" action="{{ route("tasks.destroy", [$project, $task]) }}" method="POST">
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
@endsection
