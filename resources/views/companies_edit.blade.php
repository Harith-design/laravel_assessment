<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4" style="max-width: 720px;">

    <div class="d-flex gap-2 mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm">Dashboard</a>
        <a href="{{ route('companies.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
    </div>

    <h5 class="mb-3">Edit Company</h5>

    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Company Name</label>
            <input type="text" class="form-control" name="name" value="{{ $company->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $company->email }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Logo (optional)</label>
            <input type="file" class="form-control" name="logo">

            @if($company->logo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" style="height: 60px;">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Website</label>
            <input type="text" class="form-control" name="website" value="{{ $company->website }}" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('companies.index') }}" class="btn btn-light">Cancel</a>
        </div>
    </form>

</div>