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
                    <!-- View -->
                    <button class="btn btn-info btn-sm viewCompany" data-id="{{ $company->id }}" title="View">
                        <i class="bi bi-eye"></i>
                    </button>
                    <!-- Edit -->
                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-primary" title="Edit">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <!-- Delete -->
                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this company?')" class="btn btn-sm btn-danger" title="Delete">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Company View Modal -->
    <div class="modal fade" id="viewCompanyModal" tabindex="-1" aria-labelledby="viewCompanyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewCompanyModalLabel">Company Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="companyDetails">
                        <!-- Details loaded dynamically using AJAX -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.viewCompany').on('click', function() {
                var companyId = $(this).data('id');

                $.ajax({
                    url: '/companies/' + companyId + '/view',
                    type: 'GET',
                    success: function(response) {
                        var company = response.company;

                        var html = `
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    ${company.company_logo ? 
                                        `<img src="/storage/${company.company_logo}" class="img-fluid rounded" width="120" height="120">`
                                        : '<p>No Logo</p>'
                                    }
                                </div>
                                <div class="col-md-8">
                                    <h5>${company.company_name}</h5>
                                    <p><strong>Email:</strong> ${company.email}</p>
                                    <p><strong>Mobile:</strong> ${company.mobile}</p>
                                    <p><strong>Services:</strong> ${(company.services || []).join(', ')}</p>
                                    <p><strong>Country:</strong> ${company.country ? company.country.name : ''}</p>
                                    <p><strong>State:</strong> ${company.state ? company.state.name : ''}</p>
                                    <p><strong>City:</strong> ${company.city ? company.city.name : ''}</p>
                                    <p><strong>Branches:</strong> ${(company.branches || []).join(', ')}</p>
                                </div>
                            </div>
                        `;

                        $('#companyDetails').html(html);
                        var myModal = new bootstrap.Modal(document.getElementById('viewCompanyModal'));
                        myModal.show();
                    },
                    error: function() {
                        alert('Unable to fetch company details');
                    }
                });
            });
        });
    </script>
@endsection
