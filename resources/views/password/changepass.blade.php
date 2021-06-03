@extends('layouts.master')

{{-- set page title --}}
@section('title', 'List Order')

{{-- set breadcrumbName --}}
@section('breadcrumbName', 'Changepassword ')

{{-- set breadcrumbMenu --}}
@section('breadcrumbMenu', 'List Changepassword')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="css/changepassword/changepassword-list.css">
@endpush

{{-- import file js (private) --}}
@push('js')
    <script src="js/changepassword/changepassword-list.js"></script>
@endpush

@section('content')




    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            @if (!empty($users))
                        
                @foreach ($users as $item )
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="https://lh3.googleusercontent.com/proxy/kF5dz7H9YoCKuOe2HZbVObsy0A7Yjim7g0D6TQpTBCWTTjPQ7WHnaie9nM_EyNT2LO4MYsUqwQ5F0G7yDrXWj1aFBVX-IILs6tFXEGdgmiCBHNxq" width="90"><span class="font-weight-bold">{{ $item->name }}</span><span class="text-black-50">{{ $item->email }}</span><span>Việt Nam</span></div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Edit your profile</h4>
                            </div>
                        <hr>
                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="{{ $item->name }}"></div>
                            </div>
                          
                            <br>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Password</label><input type="text" class="form-control" placeholder="education" value="{{ $item->password }}"></div>
                            </div>
                            <br>
                            <div class="row mt-3">
                               
                                <div class="col-md-6"><label class="labels">Email</label><input type="text" class="form-control" placeholder="headline" value="{{ $item->email }}"></div>
                                <div class="col-md-6"><label class="labels">Email_verified_at</label><input type="text" class="form-control" placeholder="headline" value="{{ $item->email_verified_at }}"></div>
                                
                            </div>
                            <br>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels">Phone_number</label><input type="text" class="form-control" placeholder="country" value="{{ $item->phone_number }}"></div>
                                <div class="col-md-6"><label class="labels">Address</label><input type="text" class="form-control" value="{{ $item->address }}" placeholder="state"></div>
                            </div>
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                     
                        </div>
                @endforeach

            @endif
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div>
                    <div class="d-flex flex-row mt-3 exp-container"><img src="https://cdn.pixabay.com/photo/2017/03/24/07/28/twitter-2170426_960_720.png" width="45" height="45">
                        <div class="work-experience ml-1"><span class="font-weight-bold d-block">Senior UI/UX Designer</span><span class="d-block text-black-50 labels">Twitter Inc.</span><span class="d-block text-black-50 labels">March,2017 - May 2020</span></div>
                    </div>
                    <hr>
                    <div class="d-flex flex-row mt-3 exp-container"><img src="https://img.icons8.com/color/100/000000/facebook.png" width="45" height="45">
                        <div class="work-experience ml-1"><span class="font-weight-bold d-block">Senior UI/UX Designer</span><span class="d-block text-black-50 labels">Facebook Inc.</span><span class="d-block text-black-50 labels">March,2017 - May 2020</span></div>
                    </div>
                    <hr>
                    <div class="d-flex flex-row mt-3 exp-container"><img src="https://img.icons8.com/color/50/000000/google-logo.png" width="45" height="45">
                        <div class="work-experience ml-1"><span class="font-weight-bold d-block">UI/UX Designer</span><span class="d-block text-black-50 labels">Google Inc.</span><span class="d-block text-black-50 labels">March,2017 - May 2020</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection