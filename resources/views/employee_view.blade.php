<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">

<div class="mb-3">
    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm">Dashboard</a>
</div>

<h2>Employee Details</h2>

<div class="mb-3">
    <label class="form-label"><b>First Name</b></label>
    <p>{{ $employee->firstname }}</p>
</div>

<div class="mb-3">
    <label class="form-label"><b>Last Name</b></label>
    <p>{{ $employee->lastname }}</p>
</div>

<div class="mb-3">
    <label class="form-label"><b>Company</b></label>
   <p>{{ $employee->company?->name }}</p>
</div>

<div class="mb-3">
    <label class="form-label"><b>Email</b></label>
    <p>{{ $employee->email }}</p>
</div>

<div class="mb-3">
    <label class="form-label"><b>Phone</b></label>
    <p>{{ $employee->phone }}</p>
</div>

<a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>

</div>