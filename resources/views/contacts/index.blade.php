@extends('layouts.main')
@section('title','Home | Contact APP')
<!-- content -->
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header card-title">
                <div class="d-flex align-items-center">
                <h2 class="mb-0">All Contacts</h2>
                <div class="ml-auto">
                    <a href="{{route('contacts.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                </div>
                </div>
            </div>
            <div class="card-body">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                <div class="row">
                    <div class="col">
                    <select id="filter_company_id" name="company_id" class="custom-select">
                        @if ($companies->count())
                        @foreach ($companies as $id => $name)
                        <option {{ $id == request('company_id') ? 'selected' : '' }} value="{{ $id }}">{{ $name }}</option>
                        @endforeach

                        @endif

                    </select>
                    </div>
                    <div class="col">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fa fa-refresh"></i>
                            </button>
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                            <i class="fa fa-search"></i>
                        </button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Company</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @if ($message = session('message'))
                    <div class="alert alert-success">{{ $message }}</div>

                    @endif
                    @if($contacts->count())
                        @foreach ($contacts as $index => $contact)
                            <tr>
                                <th scope="row">{{ $index + $contacts->firstItem() }}</th>
                                <td>{{ $contact->first_name }}</td>
                                <td>{{ $contact->last_name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->company->name }}</td>
                                <td width="150">
                                    <a href="{{route('contacts.show',$contact->id)}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('contacts.create')}}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('contacts.show',1)}}" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    {{$contacts->appends(request()->only('company_id'))->links()}}
                </ul>
                </nav>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection
