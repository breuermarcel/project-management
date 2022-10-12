@if($search_results->count() > 0)
    <div class="modal fade" id="bm__searchResults" tabindex="-1" aria-labelledby="bm__searchResults" aria-hidden="false"
         aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ trans('Search Results') }}:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="d-none">
                            <tr>
                                <th class="col text-capitalize"></th>
                                <th class="col text-capitalize"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($search_results as $data)
                                <tr>
                                    <td class="col">{{ $data->id }}</td>
                                    <td class="col">{{ $data->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ trans('Nothing found.') }}.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
