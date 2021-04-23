@if (session('success'))
    <div class="alert alert-success alert-dismissible " role="alert">
        <strong>SUKSES </strong> {!! session('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>ERROR </strong> {!! session('error') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>WARNING !</strong>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif