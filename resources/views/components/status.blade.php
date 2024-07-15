@if(session("success"))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{ session("success") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session("error"))
    <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
        <strong>{{ __("Error") }}: </strong>{{ session("error") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@foreach ($errors->all() as $error)
    <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
        <strong>{{ __("Error") }}: </strong>{{ $error }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endforeach
