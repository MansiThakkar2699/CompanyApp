@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add Company</h2>

    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Company Logo</label>
            <input type="file" name="company_logo" class="form-control">
        </div>

        <div class="mb-3">
            <label>Company Name</label>
            <input type="text" name="company_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Services</label>
            <select name="services[]" class="form-select" multiple required>
                @foreach($services as $service)
                    <option value="{{ $service }}">{{ $service }}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label>Country</label>
                <select id="country" name="country_id" class="form-select" required>
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label>State</label>
                <select id="state" name="state_id" class="form-select" required>
                    <option value="">Select State</option>
                </select>
            </div>

            <div class="col-md-4">
                <label>City</label>
                <select id="city" name="city_id" class="form-select" required>
                    <option value="">Select City</option>
                </select>
            </div>
        </div>

        <div class="mt-3">
            <label>Branches</label><br>
            @foreach($branches as $branch)
                <label class="me-3">
                    <input type="checkbox" name="branches[]" value="{{ $branch }}"> {{ $branch }}
                </label>
            @endforeach
        </div>

        <button class="btn btn-primary mt-3">Save</button>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#country').change(function(){
    var id = $(this).val();
    $.get('/get-states/'+id, function(data){
        $('#state').empty().append('<option value="">Select State</option>');
        $.each(data, function(i, val){
            $('#state').append('<option value="'+val.id+'">'+val.name+'</option>');
        });
    });
});

$('#state').change(function(){
    var id = $(this).val();
    $.get('/get-cities/'+id, function(data){
        $('#city').empty().append('<option value="">Select City</option>');
        $.each(data, function(i, val){
            $('#city').append('<option value="'+val.id+'">'+val.name+'</option>');
        });
    });
});
</script>
@endsection
