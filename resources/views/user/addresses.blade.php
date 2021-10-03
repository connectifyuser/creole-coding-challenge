@extends('layouts.app')
@section('content')
<div class="container">
   @include('flash-message')
   <div class="container rounded mt-5 mb-5">
      <div class="row">
        <div class="address_parent col-md-12 bg-white">
         <div class="col-md-8 offset-md-2 bg-white p-2 address_listing">
            <div class="col-md-8 listing_tbl">
            	<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Title</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@if(isset($userAddressData) && $userAddressData)
					  	@foreach($userAddressData as $key =>  $address)
					    <tr>
					      <th scope="row">{{++$key}}</th>
					      <td>{{$address['title']}}</td>
					      <td>
					      	<a href="{{route('user.edit-address-view', [ $address['id'] ])}}" class="btn btn-info btn-sm">Edit</a>
					      	<a href="{{route('user.viewaddress', [ $address['id'] ])}}" class="btn btn-info btn-sm">View</a>
					      	<a onclick="return confirm('Are you sure?')"  href="{{route('user.deleteaddress', [ $address['id']])}}" class="btn btn-danger btn-sm">Delete</a>
					      </td>
					    </tr>
					    @endforeach
					    @endif

					  </tbody>
					</table>
            </div>	
         </div>
        </div>
      </div>
   </div>
</div>
@endsection

