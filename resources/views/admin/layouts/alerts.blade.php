@if($errors->any())
    @foreach ($errors->all() as $error)
        <li class="list-group-item alert-danger mt-2 mb-2">{{ $error }}</li>
    @endforeach
@endif
@if(session()->has('success'))
    <li class="list-group-item alert-success mt-2 mb-2">{{ session()->get('success') }}</li>
@endif
