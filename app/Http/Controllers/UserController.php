<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Helper;

class UserController extends Controller
{
    /**
     * Return User profile View 
     * @param Illuminate\Http\Request.
     * @return View.
     * 
     **/
    public function userProfile()
    {
       $userData  = Auth::user();
       return view('user.profile')->with('userData', $userData);
    }

    /**
     * Return User profile View 
     * @param Illuminate\Http\Request.
     * @return View.
     * 
     **/
    public function chagePasswordView()
    {
       $userData  = Auth::user();
       return view('user.change-password')->with('userData', $userData);
    }

    /**
     * Updating user profile data.
     * @param Illuminate\Http\Request.
     * @return Illuminate\Http\Response.
     **/
    public function updateUserProfile(Request $request)
    {
        $userId  = Auth::user()->id;
        $name =  $request->userNameIs;
        $gender =  $request->userGender;

        $updateUserDetail = User::where('id', $userId)
                            ->update(
                                [
                                    'name' => $name,
                                    'gender' => $gender
                                ]);
        return response()->json([
            "status" => 1,
            "message" => 'Profile Updated',
        ]); 
    }

   public function updateProfilePicture(Request $request){
    $userId  = Auth::user()->id;
    $imageName = '';
    $pathToFile = '';

    if ($request->hasFile('profile_picture')) {
        $attachment = $request->file('profile_picture');
        $imageName = $attachment->getClientOriginalName();
        $attachment->move(public_path('uploads/userprofiles'), $imageName);
        $pathToFile = public_path('uploads/userprofiles'.'/'.$imageName);
        $updateModalObj = User::find($userId);
        $updateModalObj->profile = $imageName;

        if ($updateModalObj->save()) {
            return back()->with('success', 'Updated');
        } else {
            return back()->with('error', 'Opps something was wrong!');
        }
    }
    return Redirect::back();
   }

    /**
     * Updating user Password.
     * @param Illuminate\Http\Request.
     * @return Illuminate\Http\Response.
     **/
    public function changeUserPassword(Request $request)
    {
        $userId  = Auth::user()->id;
        $currentPassword =  $request->currentPassword;
        $newPassword =  $request->newPassword;
        $pConfirmation =  $request->passwordConfirmation;

        if ( !(Hash::check($currentPassword, Auth::user()->password )  ) )
        {
            return response()->json([
                "status" => 0,
                "message" => 'Your current password does not matches with the password you provided. Please try again.',
            ]);
        }

        if (strcmp($currentPassword , $newPassword) == 0)
        {
            return response()->json([
                "status" => 0,
                "message" => 'New Password cannot be same as your previous password. Please choose a different password.',
            ]);
        }

        if (strcmp($newPassword , $pConfirmation) != 0)
        {
            return response()->json([
                "status" => 0,
                "message" => 'Confirm Password Should be Same as New Password',
            ]);
        }

        $userUpdated = Auth::user();
        $userUpdated->password = Hash::make($newPassword);
        $userUpdated->save();

        return response()->json([
            "status" => 1,
            "message" => 'Password Updated',
        ]); 
    }

     /**
     * Return User profile View 
     * @param Illuminate\Http\Request.
     * @return View.
     * 
     **/
    public function addUserAddressView()
    {
       return view('user.add-address');
    }

     /**
     * Return User profile View 
     * @param Illuminate\Http\Request.
     * @return View.
     * 
     **/
    public function addUserAddress(Request $request)
    {
        $userId  = Auth::user()->id;
        $userAddresses = $request->addressDataArray;
        foreach($userAddresses as $key => &$address){
            $address['user_id'] = $userId;
            UserAddress::create($address);
        }
       /* $storeAddresses = new UserAddress();
        $storeAddresses->title = $userAddresses->title;
        $storeAddresses->addressline1 = $userAddresses->addressline1;
        $storeAddresses->addressline2 = $userAddresses->addressline2;
        $storeAddresses->country = $userAddresses->country;
        $storeAddresses->state = $userAddresses->state;
        $storeAddresses->city = $userAddresses->city;
        $storeAddresses->pincode = $userAddresses->pincode;
        $storeAddresses->save();*/                  
        return response()->json([
            "status" => 1,
            "message" => 'Address Added',
        ]);
    }

    /**
     * Return User Address 
     * @param Illuminate\Http\Request.
     * @return View.
     * 
     **/
    public function addresses()
    {  
       $userAddressData = UserAddress::where('user_id', Auth::user()->id)->get()->toArray();
       return view('user.addresses')->with('userAddressData', $userAddressData);
    }

    /**
     * Return User Address edit view 
     * @param Illuminate\Http\Request.
     * @return View.
     * 
     **/
    public function editAddressView(Request $request, $id)
    {  
        $addId = $request->id;
        $userAddressData = UserAddress::where('id', $addId)->get()->first();
       return view('user.address-edit')->with('userAddressData', $userAddressData);
    }


     /**
     * Return User profile View 
     * @param Illuminate\Http\Request.
     * @return View.
     * 
     **/
    public function updateUserAddress(Request $request)
    {
        $addrId  = $request->id;
        $userAddress = $request->addressDataArray[0];
        
        $storeAddresses = UserAddress::find($addrId);
        $storeAddresses->title = $userAddress['title'];
        $storeAddresses->addressline1 = $userAddress['addressline1'];
        $storeAddresses->addressline2 = $userAddress['addressline2'];
        $storeAddresses->country = $userAddress['country'];
        $storeAddresses->state = $userAddress['state'];
        $storeAddresses->city = $userAddress['city'];
        $storeAddresses->pincode = $userAddress['pincode'];
        $storeAddresses->save();                 
       
        return response()->json([
            "status" => 1,
            "message" => 'Address Updated',
        ]);
    }


    public function deleteUserAddress(Request $request, $id)
    {
        $storeAddresses = UserAddress::find($id)->delete();
        return back()->with('success', 'Address Deleted Successfully');
    }

      /**
     * Return User Address edit view 
     * @param Illuminate\Http\Request.
     * @return View.
     * 
     **/
    public function viewUserAddress(Request $request, $id)
    {  
        $addId = $request->id;
        $userAddressData = UserAddress::where('id', $addId)->get()->first();
       return view('user.view-address')->with('userAddressData', $userAddressData);
    }


     /**
     * Return User Address edit view 
     * @param Illuminate\Http\Request.
     * @return View.
     * 
     **/
    public function fetchStatesForCountry(Request $request)
    {  
       $statesF = helper::statesFilteredArr($request->country);

       return response()->json([
            "status" => 1,
            "message" => 'State Records',
            "states" => $statesF
        ]); 
    }

    


}
