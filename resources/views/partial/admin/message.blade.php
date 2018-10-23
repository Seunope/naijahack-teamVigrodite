
@if(session('success'))
    <p class="alert alert-success text-center">
        {{ session('success') }}
    </p>
@endif
@if(session('fail'))
    <p class="alert alert-danger text-center">
        {{ session('fail') }}
    </p>
@endif