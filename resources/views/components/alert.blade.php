<div class="alert alert-{{ $type }} alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5>
        <i class="icon fas @if($type == 'success') fa-check @elseif($type == 'danger') fa-ban @endif"></i>
        @if($type == 'success')
            {{ ucfirst($type) }}!
        @elseif($type == 'danger')
            {{ ucfirst('error') }}!
        @endif
    </h5>
    {{ $message }}
</div>
