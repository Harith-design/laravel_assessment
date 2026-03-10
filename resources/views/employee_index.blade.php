<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<div>

<div class="m-3 d-flex gap-2">
    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm">Dashboard</a>
    <a href="{{ route('employees.create') }}" class="btn btn-success btn-sm">Add Employee</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Company</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($employees as $employee)
      <tr>
        <td>{{ $employee->id }}</td>
        <td>{{ $employee->firstname }}</td>
        <td>{{ $employee->lastname }}</td>
        <td>{{ $employee->email }}</td>
        <td>{{ $employee->phone }}</td>
        <td>{{ $employee->company?->name }}</td>



        <!-- Action -->
        <td>
            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-primary">View</a>
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-secondary">Edit</a>
            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this employee?')">Delete
                </button>
            </form>
        </td>
      </tr>
    @endforeach


  </tbody>
</table>

<span>
    {{ $employees->links('pagination::bootstrap-5') }}
</span>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
