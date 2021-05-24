

<div class="input-group">
    <nav style="width:50%" class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">Search</a>

        <form action="{{ route('admin.customer.index') }}" method="GET" class="form-inline">
            {{-- <label class="form-label" for="form1"> searched by name</label> --}}
            <input class="form-control mr-sm-2" name="name" placeholder=" name"  value="{{ request()->get('name') }}" aria-label="Search">
            
            {{-- <label class="form-label" for="form1"> searched by email</label> --}}
            <input type="date" class="form-control mr-sm-2" name="date" placeholder="email" value="{{ request()->get('email') }}" >

        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
</div>