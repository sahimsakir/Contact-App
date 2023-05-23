@extends('layouts.main')
@section('title','Show A Contact | Contact APP')
<!-- content -->
@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header card-title">
                <strong>Contact Details</strong>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                    <label for="first_name" class="col-md-3 col-form-label">First Name</label>
                    <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $contact->first_name }}</p>
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="last_name" class="col-md-3 col-form-label">Last Name</label>
                    <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $contact->last_name }}</p>
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label">Email</label>
                    <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $contact->email }}</p>
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="phone" class="col-md-3 col-form-label">Phone</label>
                    <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $contact->phone }}</p>
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">Address</label>
                    <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $contact->address }}</p>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="company_id" class="col-md-3 col-form-label">Company</label>
                    <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $contact->company->name }}</p>
                    </div>
                    </div>
                    <hr>
                    <div class="form-group row mb-0">
                    <div class="col-md-9 offset-md-3">
                        <a href="{{route('contacts.edit',$contact->id)}}" class="btn btn-info">Edit</a>
                        <a href="{{route('contacts.destroy',$contact->id)}}" class="btn btn-outline-danger btn-delete">Delete</a>
                        @include('layouts._delete-form')
                        <a href="{{route('contacts.index')}}" class="btn btn-outline-secondary">Cancel</a>
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
