@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif
@if (session()->get('succes'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('succes') }}
    </div>
@endif
