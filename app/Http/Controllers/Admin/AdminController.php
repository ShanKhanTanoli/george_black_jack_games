<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use App\GamePage;
use App\DashboardSettings;
use App\GameHistory;
use App\HelperMethods\Game;
use App\HelperMethods\Subscriber;
use Carbon\Carbon;
use App\Game as GameModel;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);

    }

    public function dashboard()
    {

        $totalUser = User::where('role_id',2)->count();
        $totalSubsc = 0;
        $TotalEarnings = 0;

    	return view('Admin.dashboard.index')->with([
            'totalUser' => $totalUser,
            'totalSubsc' => $totalSubsc,
            'TotalEarnings' => $TotalEarnings,

        ]);
    }

	public function viewprofile()
	{
		$country = Country::all();
		return view('Admin.pages.user.personal-information',compact('country'));
	}

	public function updateprofile($id , Request $request)
	{

   	$validatedData = $request->validate([
			'profile_avatar' => ['nullable','mimes:jpeg,jpg,png'],

            'firstname' => ['required', 'string', 'max:15'],
            'lastname' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:30', 'unique:users,email,'.$id ],

            'phone' => ['nullable', 'string', 'max:13', 'unique:users,phone,'.$id],

            'address1' => ['nullable', 'string', 'max:255'],
            'address2' => ['nullable', 'string', 'max:255'],

            'country' => ['nullable', 'string', 'max:20'],
            'city' => ['nullable', 'string', 'max:20'],
            'state' => ['nullable', 'string', 'max:20'],
            'postalcode' => ['nullable', 'string', 'max:20'],
    ]);


		$user = User::findOrFail($id);
		$image = $request->file('profile_avatar');

		if ($image != null) {
        $imagename = $image->getClientOriginalName();
        $image->move('images/admin',$imagename);
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
		return view('Admin.pages.user.change-password');
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
    
    /*Admin Game Starts*/

    public function game($name,$id)
    {

        $url = route('PlayGame',['name' => $name , 'id' => $id]);
                
        return view('game.game')->with([
            'game' => GamePage::where('GameId',$id)->first(),
            'url' => $url,
        ]);
    }

    public function gametermsinfo($name,$id)
    {
        
        return view('game.creategamepage')->with([
            'game' => GamePage::where('GameId',$id)->first(),
        ]);
    }

    public function storegameinfo(Request $request ,$id)
    {

        $msg = [
            'pagetitle.required' => 'Page Title is Required',
            'gameinfo.required' => 'Game Info is Required',
            'buttontext.required' => 'Button Text is required',
        ];

        $validate = $request->validate([
            'pagetitle' => 'required',
            'gameinfo' => 'required',

            'buttontext' => 'required',

        ],$msg);

        $page = GamePage::where('GameId',$id);
      
        $store = $page->update([
            'pagetitle' => $request->pagetitle,
            'gameinfo' => $request->gameinfo,
            'buttontext' => $request->buttontext,
        ]);



        if ($store) {

        $success = $request->session()->flash('success','Page  Updated Successfully');
        return back();

        }
        
    }
    /*Admin Game Ends*/

        /******begin::Site Settings******/
        public function settings()
        {
            return view('Admin.pages.settings.settings');
        }

        public function SaveSettings(Request $request , $id)
        {
            $validate = $request->validate([
                'sitetitle' => 'nullable',

            ]);

            $settings = DashboardSettings::find($id);

            $settings = $settings->update([
                'sitetitle' => $request->sitetitle,
            ]);

            if ($settings) {
        
                $success = $request->session()->flash('success','Settings  Updated Successfully');
                return back();

            }
        }
        public function Sitelogo()
        {
           return view('Admin.pages.settings.sitelogo');
        }

        public function SaveSitelogo(Request $request , $id)
        {

        $request->validate([
            'profile_avatar' => 'nullable|mimes:jpeg,jpg,png,gif',
        ]);


        $image = $request->file('profile_avatar');
        if ($image != null) {

        $imagename = $image->getClientOriginalName();
        
        $image->move('images/site',$imagename);

        $settings = DashboardSettings::findOrFail($id);

            $settings = $settings->update([
                'siteLogo' => $imagename,
            ]);

        if ($settings) {
                $success = $request->session()->flash('success','Site Logo  Updated Successfully');
                return back();

            }

        }
        else{

            return redirect()->route('AdminSiteLogo');

            }
        }

        public function RemoveSitelogo(Request $request , $id)
        {
            $settings = DashboardSettings::findOrFail($id);

            $settings = $settings->update([
                'siteLogo' => null,
            ]);

        if ($settings) {
                $success = $request->session()->flash('success','Site Logo  Removed Successfully');
                return back();

            }

        }
        /******end::Site Settings******/
}
