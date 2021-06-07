<nav class="navbar navbar-light bg-light justify-content-between">
    {{-- <a class="navbar-brand">Navbar</a> --}}
    <form class="form-inline">
      <input class="form-control mr-sm-2" name ="name" type="search" placeholder="name" aria-label="Search">
      <br>
      <input type="date" class="form-control mr-sm-2" name="date" type="search" placeholder="date" aria-label="Search">
      {{-- <div class="col-md-4">
        <select class="form-control" name="status">
            <option value=""></option>
            <option value="0" name="status" {{ !empty($status) && $status=='0' ? 'selected' : '' }}>chưa thanh toán</option>
            <option value="1" name="status" {{ !empty($status) && $status=="1" ? 'selected' : '' }}>Đã thanh toán online</option>
            <option value="2" name="status" {{ !empty($status) && $status=="2" ? 'selected' : '' }}> shipper đang đi giao hàng</option>
            <option value="3" name="status" {{ !empty($status) && $status=="3" ? 'selected' : '' }}> cancel đơn hàng</option>
            <option value="4" name="status" {{ !empty($status) && $status=="4" ? 'selected' : '' }}> hoàn thành</option>
          </select>
    </div> --}}
    <hr>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </nav>