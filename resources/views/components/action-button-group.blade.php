@if(request('status') === 'deleted')
    <div class="btn-group btn-group-sm">

        @if(isset($restoreRoute) && $restoreRoute != null)
            <a href="{{ $restoreRoute }}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Restore">
                <i class="fas fa-undo-alt"></i>
            </a>
        @endif

        @if(isset($forceDeleteRoute) && $forceDeleteRoute != null)
            <a href="{{ $forceDeleteRoute }}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Permanent Delete">
                <i class="far fa-trash-alt"></i>
            </a>
        @endif

    </div>
@else
    <form action="{{ $deleteRoute }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="btn-group btn-group-sm">

            @if($viewRoute != null)
                <a href="{{ $viewRoute }}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View">
                    <i class="far fa-eye"></i>
                </a>
            @endif

            @if($editRoute != null)
                <a href="{{ $editRoute }}" type="button" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Edit">
                    <i class="far fa-edit"></i>
                </a>
            @endif

            <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                <i class="far fa-trash-alt"></i>
            </button>

        </div>

    </form>
@endif
