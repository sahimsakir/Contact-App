@extends('layouts.main')
@section('title','Show A Company | Contact APP')
<!-- content -->
@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header card-title">
                <strong>Company Details</strong>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">Name</label>
                    <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $company->name }}</p>
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                            <p class="form-control-plaintext text-muted">{{ $company->email }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="website" class="col-md-3 col-form-label">Website</label>
                    <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $company->website }}</p>
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">Address</label>
                    <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $company->address }}</p>
                    </div>
                    </div>
                    <hr>
                    <div class="form-group row mb-0">
                    <div class="col-md-9 offset-md-3">
                        <a href="{{route('companies.edit',$company->id)}}" class="btn btn-info">Edit</a>
                        <a href="{{route('companies.destroy',$company->id)}}" class="btn btn-outline-danger btn-delete">Delete</a>
                        @include('layouts._delete-form')
                        <a href="{{route('companies.index')}}" class="btn btn-outline-secondary ">Cancel</a>
                    </div>
                    </div>
                </div>
                </div>
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
