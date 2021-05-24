<h4>Thông Tin Cá Nhân</h4>
<br>
<div class="border p-2 btn btn-info table">
    <div class="p-2">
        <label for="">Fullname</label>
        <p>{{ Auth::user()->name }}</p>
    </div>
    <hr>
    <div class="p-2">
        <label for="">Email</label>
        <p>{{ Auth::user()->email }}</p>
    </div>
    <hr>
    <div class="p-2">
        <label for="">Phone</label>
        <p>{{ Auth::user()->phone_number }}</p>
    </div>
    <hr>
    <div class="p-2">
        <label for="">Address</label>
        <p>{{ Auth::user()->address }}</p>
    </div>
</div>