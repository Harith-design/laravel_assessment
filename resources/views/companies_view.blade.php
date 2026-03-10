<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">

<div class="mb-3">
    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm">Dashboard</a>
</div>

<h2>Company Details</h2>

<div class="mb-3">
    <label><b>Name</b></label>
    <p>{{ $company->name }}</p>
</div>

<div class="mb-3">
    <label><b>Email</b></label>
    <p>{{ $company->email }}</p>
</div>

<div class="mb-3">
    <label><b>Logo</b></label><br>
    <img src="{{ asset('storage/' . $company->logo) }}" width="150">
</div>

<div class="mb-3">
    <label><b>Website</b></label>
    <p>{{ $company->website }}</p>
</div>

<a href="{{ route('companies.index') }}" class="btn btn-secondary">Back</a>

</div>