@extends('layouts.app')
@section('content')
<div class="container">
      @include('flash-message')
    <div class="container rounded mt-5 mb-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 bg-white">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Detail</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label>
                        <input type="text" class="form-control user_name" placeholder="name" value="{{$userData->name}}"></div>
                </div>
                 <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Email</label><input type="text" class="form-control" placeholder="email" value="{{$userData->email}}" disabled="disabled"></div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                               <div class="form-check">
                                      <input class="form-check-input user_gender" type="radio" name="gender" id="exampleRadios1" value="male" {{$userData->gender == 'male' ? 'checked' : ''}}>
                                      <label class="form-check-label" for="exampleRadios1">
                                        Male
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input user_gender" type="radio" name="gender" id="exampleRadios2" value="female" {{$userData->gender == 'female' ? 'checked' : ''}}>
                                      <label class="form-check-label" for="exampleRadios2">
                                        Female
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input user_gender" type="radio" name="gender" id="exampleRadios3" value="other" {{$userData->gender == 'other' ? 'checked' : ''}}>
                                      <label class="form-check-label" for="exampleRadios3">
                                        Other
                                      </label>
                                    </div>
                            </div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="button">Update</button>
                </div>
            </div>
        </div>

        <div class="col-md-8 offset-md-2 bg-white mt-5 p-5">
        <div class="d-flex justify-content-between align-items-center mb-3">

        <img class="pro_img" src="{{ asset('uploads/userprofiles') }}/{{$userData->profile}}">
         <form id="update-profile-picture" action="{{route('user.updatepicture')}}" method="post" enctype="multipart/form-data">
            @csrf
            <span class="p-5 mt-5 mb-5">Change Profile Picture</span>
            <div class="form-group">
            <input type="file" name="profile_picture" placeholder="Choose File" id="file">
            </div>
             <button type="submit" class="btn btn-primary" type="button">Update</button>
        </form>
        </div>
    </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
