@if(request('status') === 'deleted')
    <div class="btn-group btn-group-sm">

        <a href="{{ $restoreRoute }}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Restore">
            <i class="fas fa-undo-alt"></i>
        </a>

        <a href="{{ $forceDeleteRoute }}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Permanent Delete">
            <i class="far fa-trash-alt"></i>
        </a>

    </div>
@else
    <form action="{{ $deleteRoute }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="btn-group btn-group-sm">

            <a href="{{ $viewRoute }}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View">
                <i class="far fa-eye"></i>
            </a>

            <a href="{{ $editRoute }}" type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Edit">
                <i class="far fa-edit"></i>
            </a>

            <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                <i class="far fa-trash-alt"></i>
            </button>

        </div>

    </form>
@endif
