<div class="row">
    <div class="col-7">
        Showing {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} of {{ $paginator->total() }}
    </div>
    <div class="col-5">
        <div class="btn-group float-end">
            @if ($paginator->onFirstPage())
                <button type="button" class="btn btn-sm btn-success waves-effect" disabled><i class="fa fa-chevron-left"></i></button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-left"></i></a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-right"></i></a>
            @else
                <button type="button" class="btn btn-sm btn-success waves-effect" disabled><i class="fa fa-chevron-right"></i></button>
            @endif
        </div>
    </div>
</div>
