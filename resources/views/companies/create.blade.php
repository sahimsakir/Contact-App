@extends('layouts.main')
@section('title','Add A Company | Contact APP')
<!-- content -->
@section('content')
    <div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header card-title">
            <strong>Add New Company</strong>
            </div>
            <div class="card-body">
            <form action="{{ route('companies.store') }}" method="POST">
                @csrf
                @include('companies._form')
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
