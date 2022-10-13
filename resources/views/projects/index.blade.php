@extends('project-management::main')

@section('content')
    <div class="row g-3">
        <div class="col-12">
            <h1>{{ trans("Projects") }}</h1>
        </div>

        <div class="col-12">
            <div class="btn-group ms-auto">
                <a href="{{ route("projects.create") }}" class="btn btn-dark">{{ trans("Create") }}</a>
            </div>
        </div>

        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans("Name") }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <th>{{ $project->name }}</th>

                            <td>
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
            </div>
        </div>
    </div>
@endsection
