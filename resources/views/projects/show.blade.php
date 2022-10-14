@extends('project-management::main')

@section("heading")
    <h1>{{ $project->name }}</h1>
    <small class="ps-2">({{ $project->customer->company_name }})</small>

    <div class="btn-group ms-auto">
        <a href="{{ route("projects.index") }}" target="_self" class="btn btn-dark">{{ trans("List") }}</a>
        <a href="{{ route("projects.edit", $project) }}" target="_self" class="btn btn-dark">{{ trans("Edit") }}</a>
    </div>
@endsection

@section('content')
    <div id="bm__project_description">
        {{ $project->description }}
    </div>
@endsection
