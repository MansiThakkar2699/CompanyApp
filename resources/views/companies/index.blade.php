@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Company List</h2>
        <a href="{{ route('companies.create') }}" class="btn btn-success">+ Add Company</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Company Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
            <tr>
                <td>
                    @if($company->company_logo)
                        <img src="{{ asset('storage/'.$company->company_logo) }}" width="50">
                    @endif
                </td>
                <td>{{ $company->company_name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->mobile }}</td>
                <td>
                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this company?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
