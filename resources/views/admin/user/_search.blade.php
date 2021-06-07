<nav class="navbar navbar-light bg-light justify-content-between">
    {{-- <a class="navbar-brand">Sear</a> --}}
    <form class="form-inline" action="{{ route('admin.user.index') }}" method="GET">
      <input class="form-control mr-sm-2" name="name" type="search" placeholder="name" aria-label="Search">
      <br>
      <input class="form-control mr-sm-2" name="role_id" type="search" placeholder="status" aria-label="Search">
      {{-- <hr>
      <div class="col-md-4">
        <select class="form-control" name="status">
            <option value=""></option>
            <option value="1" name="role_id" {{ !empty($admins) && $admin->role_id == \App\Models\Admin::STATUS[1] ? 'selected' : '' }}>Admin</option>
            <option value="2" name="role_id" {{ !empty($admins) && STATUS[2] ? 'selected' : '' }}>Editer</option>
            <option value="3" name="role_id" {{ !empty($admins) && STATUS[3] ? 'selected' : '' }}>Shipper</option>
          </select>
    </div> --}}
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </nav>