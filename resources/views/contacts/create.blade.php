@extends('layouts.main')
@section('title','Add A Contact | Contact APP')
<!-- content -->
@section('content')
    <div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header card-title">
            <strong>Add New Contact</strong>
            </div>
            <div class="card-body">
            <form action="{{ route('contacts.store') }}" method="post">
                @csrf
                @include('contacts._form')
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
