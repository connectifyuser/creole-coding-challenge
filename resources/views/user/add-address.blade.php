@extends('layouts.app')
@section('content')
<div class="container">
   @include('flash-message')
   <div class="container rounded mt-5 mb-5">
      <div class="row">
        <div class="address_parent col-md-12 bg-white">
         <div class="col-md-8 offset-md-2 bg-white p-2 address_main">
            <span class="err_container"></span>
            <div class="child_div_address">
               <div class="address_input">
                  <div class="form-group row">
                     <label class="col-md-4 detail-title">Title *
                     </label>
                     <div class="col-md-8">
                        <input name="adress_title" type="text" class="form-control custom-input mb-2  adress_title" placeholder="Title" autocomplete="off">
                     </div>
                  </div>
               </div>
               <div class="address_input">
                  <div class="form-group row">
                     <label class="col-md-4 detail-title">Address Line 1 *
                     </label>
                     <div class="col-md-8">
                        <input name="address_line1" type="text" class="form-control address_line1 mb-2" placeholder="Address line 1" autocomplete="off">
                     </div>
                  </div>
               </div>
               <div class="address_input">
                  <div class="form-group row">
                     <label class="col-md-4 detail-title">Address Line 2 *
                     </label>
                     <div class="col-md-8">
                        <input name="address_line2" type="text" class="form-control custom-input mb-2  address_line2" placeholder="Address line 2" autocomplete="off">
                     </div>
                  </div>
               </div>
               <div class="address_input">
                  <div class="form-group row">
                     <label class="col-md-4 detail-title">Country *
                     </label>
                     <div class="col-md-8">
                        <!--  <input name="country" type="text" class="form-control custom-input mb-2  country" placeholder="Country" autocomplete="off"> -->
                        <select class="custom-select country">
                           <option value="">
                              Select Country
                           </option>
                           @foreach(Helper::countriesArray() as $country)
                           <option value="{{$country}}">
                             {{$country}}
                           </option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <div class="address_input">
                  <div class="form-group row">
                     <label class="col-md-4">State *
                     </label>
                     <div class="col-md-8">
                        <select class="custom-select state">
                           @foreach(Helper::states() as $state)
                           <option value="{{$state}}">
                             {{$state}}
                           </option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <div class="address_input">
                  <div class="form-group row">
                     <label class="col-md-4">City *
                     </label>
                     <div class="col-md-8">
                        <input name="city" type="text" class="form-control custom-input mb-2  city" placeholder="City" autocomplete="off">
                     </div>
                  </div>
               </div>
               <div class="address_input">
                  <div class="form-group row">
                     <label class="col-md-4 detail-title">Pincode *
                     </label>
                     <div class="col-md-8">
                        <input name="pin" type="text" class="form-control mb-2 pin" placeholder="Pin" autocomplete="off">
                     </div>
                  </div>
               <a href="javascript:void(0)" class="btn btn-secondary add_new_address">Add New</a>
               </div>
            </div>
         </div>
            <a href="javascript:void(0)" class="btn btn-secondary save_addresses mt-5 mb-2">Save</a>
        </div>
      </div>
   </div>
</div>
@endsection

