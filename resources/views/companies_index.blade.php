<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<div>

<div class="m-3 d-flex gap-2">
    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm">Dashboard</a>
    <a href="{{ route('companies.create') }}" class="btn btn-success btn-sm">Add Company</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Company Name</th>
      <th scope="col">Email</th>
      <th scope="col">Logo</th>
      <th scope="col">Website</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($companies as $company)
      <tr>
        <td>{{ $company->id }}</td>
        <td>{{ $company->name }}</td>
        <td>{{ $company->email }}</td>
        <td>
            <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="100">
        </td>
        <td>{{ $company->website }}</td>
        <td>
            <a href="{{ route('companies.show', $company->id) }}" class="btn btn-primary">View</a>
            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-secondary">Edit</a>
            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this company?')">Delete
                </button>
            </form>
        </td>
      </tr>
    @endforeach


  </tbody>
</table>

<span>
    {{ $companies->links('pagination::bootstrap-5') }}
</span>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
