<?php

namespace App\Http\Controllers\User\UserProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','customer']);

    }

	public function viewprofile()
	{
		$country = Country::all();
		return view('User.pages.user.personal-information',compact('country'));
	}

	public function updateprofile($id , Request $request)
	{

   	$validatedData = $request->validate([
			'profile_avatar' => ['nullable','mimes:jpeg,jpg,png'],

            'firstname' => ['required', 'string', 'max:15'],
            'lastname' => ['required', 'string', 'max:15'],

            'phone' => ['nullable', 'string', 'max:13', 'unique:users,phone,'.$id],

            'address1' => ['required', 'string', 'max:255'],
            'address2' => ['nullable', 'string', 'max:255'],

            'country' => ['required', 'string', 'max:20'],
            'city' => ['required', 'string', 'max:20'],
            'state' => ['required', 'string', 'max:20'],
            'postalcode' => ['required', 'string', 'max:20'],
    ]);


		    $user = User::findOrFail($id);

		    $image = $request->file('profile_avatar');

            if ($image) {
                
                $imagename = sha1($user->id.$user->firstname.$image->getClientOriginalName());

                $image->move('images/user/',$imagename);
                $user->avatar = $imagename;
            }
            
		    $user->firstname = $request->firstname;
		    $user->lastname = $request->lastname;

		    $user->phone = $request->phone;
		    $user->address1 = $request->address1;

		    $user->address2 = $request->address2;
		    $user->country = $request->country;

		    $user->city = $request->city;
		    $user->state = $request->state;

		    $user->postalcode = $request->postalcode;

		if ($user->save()) {

    	$success = $request->session()->flash('message', 'Profile Updated Successfully');

    	return back()->with('success',$success);
        }
      
	}

    public function RemoveProfilePicture(Request $request , $id)
    {
        $user = User::findOrFail($id);

        $user->avatar = null;

        if ($user->save()) {
        $success = $request->session()->flash('message', 'Profile Picture Deleted Successfully');

        return back()->with('success',$success);
    }

    }

	public function password()
	{
		return view('User.pages.user.change-password');
	}

    public function changepass(Request $request , $id)
    {

    $validatedData = $request->validate([
       'password' => ['nullable', 'string', 'min:8', 'confirmed'],
    ]);
    
    $user = User::findOrFail($id);
    if($request->password != null){

    	$user->password = bcrypt($request->password);

    }else{

    	$success = $request->session()->flash('message', 'You did not Entered any Password');
    	return back();
    }
    

    if ($user->save()) {

    	$success = $request->session()->flash('message', 'Password Changed Successfully');

    	return back()->with('success',$success);
    }

    }
}
