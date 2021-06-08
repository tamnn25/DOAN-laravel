<nav class="navbar navbar-light bg-light justify-content-between">
    {{-- <a class="navbar-brand">Navbar</a> --}}
    <form class="form-inline">
      <input class="form-control mr-sm-2" name ="name" type="search" placeholder="name" aria-label="Search">
      <br>
      <input type="date" class="form-control mr-sm-2" name="date" type="search" placeholder="date" aria-label="Search">
        <div class="col-md-4">
          <select class="form-control" name="status">
              <option value="">Trạng thái đơn hàng</option>
              <option value="1"  {{ !empty($status) && $status=='1'}}>chưa thanh toán</option>
              <option value="2"  {{ !empty($status) && $status=="2"}}>Đã thanh toán online</option>
              <option value="3"  {{ !empty($status) && $status=="3"}}> shipper đang đi giao hàng</option>
              <option value="4"  {{ !empty($status) && $status=="4"}}> cancel đơn hàng</option>
              <option value="5"  {{ !empty($status) && $status=="5"}}> hoàn thành</option>
              {{-- <option value="5"  {{ !empty($status) && $status=="5" ? 'selected' : '' }}> hoàn thành</option> --}}

            </select>
      </div>
    <hr>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </nav>