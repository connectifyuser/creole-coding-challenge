@extends('layouts.app')
@section('content')
<div class="container">
   @include('flash-message')
   <div class="container rounded mt-5 mb-5">
      <div class="row">
      	<input type="hidden" class="address_own" value="{{$userAddressData->id}}">
        <div class="address_parent col-md-12 bg-white">
         <div class="col-md-8 offset-md-2 bg-white p-2 address_main">
            <div class="child_div_address">
               <div class="address_input">
                  <div class="form-group row">
                     <label class="col-md-4 detail-title">Title
                     </label>
                     <div class="col-md-8">
                        <span>{{$userAddressData->title}}</span>
                        <!-- <input name="adress_title" type="text" value="{{$userAddressData->title}}" class="form-control custom-input mb-2  adress_title" placeholder="Title" autocomplete="off"> -->
                     </div>
                  </div>
               </div>
               <div class="address_input">
                  <div class="form-group row">
                     <label class="col-md-4 detail-title">Address Line 1
                     </label>
                     <div class="col-md-8">
                        <span>{{$userAddressData->addressline1}}</span>
                      <!--   <input name="address_line1"  value="{{$userAddressData->addressline1}}" type="text" class="form-control address_line1 mb-2" placeholder="Address line 1" autocomplete="off"> -->
                     </div>
                  </div>
               </div>
               <div class="address_input">
                  <div class="form-group row">
                     <label class="col-md-4 detail-title">Address Line 2
                     </label>
                     <div class="col-md-8">
                        <span>{{$userAddressData->addressline2}}</span>
                  
                     </div>
                  </div>
               </div>
               <div class="address_input">
                  <div class="form-group row">
                     <label class="col-md-4 detail-title">Country
                     </label>
                     <div class="col-md-8">
                      
                        <span>{{$userAddressData->country}}</span>
                       
                     </div>
                  </div>
               </div>
               <div class="address_input">
                  <div class="form-group row">
                     <label class="col-md-4">State
                     </label>
                     <div class="col-md-8">
                        <span>{{$userAddressData->state}}</span>
                       
                     </div>
                  </div>
               </div>
               <div class="address_input">
                  <div class="form-group row">
                     <label class="col-md-4">City
                     </label>
                     <div class="col-md-8">
                        <span>{{$userAddressData->city}}</span>
                      
                     </div>
                  </div>
               </div>
               <div class="address_input">
                  <div class="form-group row">
                     <label class="col-md-4 detail-title">Pincode
                     </label>
                     <div class="col-md-8">
                        
                        <span>{{$userAddressData->pincode}}</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
            <a href="javascript:void(0)" class="btn btn-secondary update_addresses mt-5 mb-2">Update</a>
        </div>
      </div>
   </div>
</div>
@endsection

