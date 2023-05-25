@extends('layouts.main')
@section('title','All Companies | Contact APP')
<!-- content -->
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header card-title">
                <div class="d-flex align-items-center">
                <h2 class="mb-0">All Companies</h2>
                <div class="ml-auto">
                    <a href="{{route('companies.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                </div>
                </div>
            </div>
            <div class="card-body">
            @include('companies._filter')
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                    <th scope="col">Contacts</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @include('layouts._message')
                    @if($companies->count())
                        @foreach ($companies as $index => $company)
                            <tr>
                                <th scope="row">{{ $index + $companies->firstItem() }}</th>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->address }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->website }}</td>
                                <td>{{ $company->contacts->count() }}</td>
                                <td width="150">
                                    <a href="{{route('companies.show',$company->id)}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('companies.edit',$company->id)}}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('companies.destroy',$company->id)}}" class="btn btn-sm btn-circle btn-outline-danger btn-delete" title="Delete"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach

                            @include('layouts._delete-form')
                    @endif
                </tbody>
            </table>

            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    {{$companies->links()}}
                </ul>
                </nav>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection
