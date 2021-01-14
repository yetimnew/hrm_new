@if (count($errors)>0)

@foreach ($errors->all() as $error)

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong> {{$error}}!</strong>
</div>
@endforeach
</ul>

@endif
