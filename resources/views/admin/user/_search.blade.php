<nav class="navbar navbar-light bg-light justify-content-between">
    {{-- <a class="navbar-brand">Sear</a> --}}
    <form class="form-inline" action="{{ route('admin.user.index') }}" method="GET">
      <input class="form-control mr-sm-2" name="name" type="search" placeholder="name" aria-label="Search">
      <br>
      <input class="form-control mr-sm-2" name="role_id" type="search" placeholder="status" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </nav>