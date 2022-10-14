@extends('project-management::main')

@section("heading")
    <h1>{{ trans("Projects") }}</h1>

    <div class="btn-group ms-auto">
        <a href="{{ route("projects.create") }}" target="_self" class="btn btn-dark">{{ trans("Create") }}</a>
    </div>
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ trans("Name") }}</th>
                <th scope="col"><span class="visually-hidden">{{ trans("Toolbar") }}</span></th>
            </tr>
            </thead>
            <tbody>

            @foreach($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <th>{{ $project->name }}</th>

                    <td class="text-end">
                        <a href="{{ route("projects.show", $project) }}" target="_self" class="btn btn-dark">
                            {{ trans("Show") }}
                        </a>
                        <a href="{{ route("projects.edit", $project) }}" target="_self" class="btn btn-dark">
                            {{ trans("Edit") }}
                        </a>
                        <form class="d-inline" action="{{ route("projects.destroy", $project) }}"
                              method="POST">
                            @method("DELETE")
                            @csrf

                            <button class="btn btn-dark" type="submit">{{ trans("Delete") }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
@endsection
