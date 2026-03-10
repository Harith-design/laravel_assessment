<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4" style="max-width: 720px;">

    <div class="d-flex gap-2 mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm">Dashboard</a>
        <a href="{{ route('companies.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
    </div>

    <h5 class="mb-3">Add Company</h5>

    <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Company Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Logo</label>
            <input type="file" class="form-control" name="logo" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Website</label>
            <input type="text" class="form-control" name="website" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('companies.index') }}" class="btn btn-light">Cancel</a>
        </div>

    </form>

</div>