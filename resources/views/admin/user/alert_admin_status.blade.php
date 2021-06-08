
@if ($admin->role_id == \App\Models\Admin::STATUS[1])
    <div class="btn btn-success" role="alert">Admin</div>
@elseif ($admin->role_id == \App\Models\Admin::STATUS[2])
    <div class="btn btn-warning" role="alert">Editor</div>
@else
    <div class="btn btn-info" role="alert">shipper</div>
@endif