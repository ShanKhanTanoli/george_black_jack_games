<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Country;

class CustomerController extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth','admin']);

    }
    
    /******begin::List,View & Update Customer******/
   	public function Customers()
	{
        $user = User::withTrashed()->get();
		return view('Admin.pages.Customers.index')->with([
			'user' => $user,
		]);
	}

    public function ViewCustomer($id)
    {
        $user = User::withTrashed()->find($id);
        

        return view('Admin.pages.Customers.ViewCustomer')->with([

            'user' => $user,
            'country' => Country::all(),

        ]);
    }

    public function UpdateCustomer($id , Request $request)
    {

    $validatedData = $request->validate([
            'profile_avatar' => ['nullable','mimes:jpeg,jpg,png'],
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email,'.$id ],

            'phone' => ['nullable', 'string', 'unique:users,phone,'.$id],

            'address1' => ['nullable', 'string'],
            'address2' => ['nullable', 'string'],

            'country' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'state' => ['nullable', 'string'],
            'postalcode' => ['nullable', 'string'],
    ]);

        $user = User::findOrFail($id);
        $image = $request->file('profile_avatar');

        if (!is_null($image)) {

        $imagename = sha1($image->getClientOriginalName());
        $image->move('images/user',$imagename);

        $user->avatar = $imagename;

        }

            $user->firstname = $request->firstname;

            $user->lastname = $request->lastname;
            $user->email = $request->email;

            $user->phone = $request->phone;
            $user->address1 = $request->address1;

            $user->address2 = $request->address2;
            $user->country = $request->country;

            $user->city = $request->city;
            $user->state = $request->state;

            $user->postalcode = $request->postalcode;

        if ($user->save()) {

        $success = $request->session()->flash('message', 'Subscriber Updated Successfully');

        return back()->with('success',$success);
    }  
    }
    /******end::List,View & Update Customer******/

    /******begin::Customer Password******/
    public function CustomerPassword($id)
    {
        $user = User::withTrashed()->find($id);

        return view('Admin.pages.Customers.CustomerPassword')->with([
            'user' => $user,
        ]);
    }

    public function SaveCustomerPassword(Request $request , $id)
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

        $success = $request->session()->flash('message', 'Subscriber Password Changed Successfully');

        return back()->with('success',$success);
    }

    }
    /******end::Customer Password******/

    /******begin::Upload & Remove Customer Profile Picture******/
    public function RemoveCustomerProfilePicture(Request $request , $id)
    {
        $user = User::findOrFail($id);

        $user->avatar = null;

        if ($user->save()) {
        $success = $request->session()->flash('message', 'Profile Picture Deleted Successfully');

        return back()->with('success',$success);
    }

    }
    /******begin::Upload & Remove Customer Profile Picture******/

	/******begin::Customer Gift Cards******/
    public function CustomerGiftCards($id)
    {
    	$user = User::find($id);
        $vouchers = $user->vouchers;
    	return view('Admin.pages.Customers.CustomerGiftCards')->with([
            'user' => $user,
            'vouchers' => $vouchers,
        ]);
    }
    /******end::Customer Gift Cards******/

    /******begin::Block,Restore & Delete Customer******/
    public function BlockCustomer(Request $request, $id)
    {
        $user = User::find($id);

        if ($user->delete()) {
            
            $success = $request->session()->flash('success', 'Customer Blocked Successfully');
            return back();
        }
    }
   	public function RestoreCustomer(Request $request, $id)
    {
        $user = User::withTrashed()->find($id);

        if ($user->restore()) {
            
            $success = $request->session()->flash('success', 'Customer Restored Successfully');
            return back();
        }
    }
    public function DeleteSubscriberPermanent(Request $request ,$id)
    {
        $user = User::find($id);
        if ($user->forceDelete()) {

            $success = $request->session()->flash('success', 'Customer Deleted Successfully');
            
            return back();
        }
    }
    /******begin::Block,Restore & Delete Customer******/


}
