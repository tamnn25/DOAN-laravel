<nav class="navbar navbar-light bg-light justify-content-between">
    {{-- <a class="navbar-brand">Sear</a> --}}
    <form class="form-inline" action="{{ route('admin.user.index') }}" method="GET">
      <input class="form-control mr-sm-2" name="name" type="search" placeholder="name" aria-label="Search">
      
      {{-- <input class="form-control mr-sm-2" name="role_id" type="search" placeholder="status" aria-label="Search"> --}}
      
      <div class="col-md-4">
        <select class="form-control" name="role_id">
            <option value="">Trạng thái</option>
            <option value="1" {{ !empty($role_id) && $role_id == 1}}>Admin</option>
            <option value="2" {{ !empty($role_id) && $role_id == 2}}>Editor</option>
            <option value="3" {{ !empty($role_id) && $role_id == 3}}>Shipper</option>
          </select>
      </div>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </nav>