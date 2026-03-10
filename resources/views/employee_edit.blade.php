<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4" style="max-width: 720px;">

    <div class="d-flex gap-2 mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm">Dashboard</a>
        <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
    </div>

    <h5 class="mb-3">Edit Employee</h5>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control" name="firstname" value="{{ $employee->firstname }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control" name="lastname" value="{{ $employee->lastname }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Company</label>
            <select class="form-select" name="company_id" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" @if($company->id == $employee->company_id) selected @endif>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $employee->email }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('employees.index') }}" class="btn btn-light">Cancel</a>
        </div>
    </form>

</div>