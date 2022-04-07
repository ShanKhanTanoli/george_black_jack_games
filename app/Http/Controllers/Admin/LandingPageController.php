<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LandingPage;

class LandingPageController extends Controller
{
        public function __construct()
	    {
	        $this->middleware(['auth','admin']);

	    }

        /*begin::Admin Site About Section*/
        public function SiteAbout()
        {
            return view('Admin.pages.settings.SiteAboutSection');
        }

        public function SaveSiteAbout(Request $request , $id)
        {
            $rules = [
                'about_heading.required' => 'Heading is required for About Section',
                'about_description.required' => 'Description is required for About Section',
            ];
            $validate = $request->validate([
                'about_heading' => 'required|string',
                'about_description' => 'required|string',
            ],$rules);

            $settings = LandingPage::find($id);

            $settings = $settings->update([
                'about_heading' => $request->about_heading,
                'about_description' => $request->about_description,
            ]);

            if ($settings) {
        
                $success = $request->session()->flash('success','About Section Updated Successfully');
                return back();

            }else{
              return back()->withError('error','Something Went Wrong!');  
            }
        }
    /*end::Admin Site About Section*/

        /*begin::Admin Site Main Section*/
        public function SiteMain()
        {
            return view('Admin.pages.settings.SiteMainSection');
        }

        public function SaveSiteMain(Request $request , $id)
        {
            $rules = [
                'page_heading.required' => 'Heading is required',
                'short_description.required' => 'Short Description is required',
                'long_description.required' => 'Long Description is required',
                'profile_avatar.mimes' => 'Image should be JPEG,JPG,PNG',

                'profile_avatar.image' => 'Please Select a Valid Image',
            ];
            $validate = $request->validate([

                'page_heading' => 'required|string',
                'short_description' => 'required|string',
                'long_description' => 'required|string',
                'profile_avatar' => 'nullable|image|mimes:jpg,jpeg,png',

            ],$rules);

            $image = $request->file('profile_avatar');

            if (!is_null($image)) {

            $imagename = sha1(md5($image->getClientOriginalName()));

            $image->move('LandingPage/images/upload/',$imagename);

            $settings = LandingPage::find($id);

            $settings = $settings->update([
                'hero_image' => $imagename,
            ]);

            }

            $settings = LandingPage::find($id);

            $settings = $settings->update([
                'page_heading' => $request->page_heading,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            if ($settings) {
        
                $success = $request->session()->flash('success','Main Section Updated Successfully');
                return back();

            }else{

              return back()->withError('error','Something Went Wrong!');  
            }
        }
        public function RemoveSiteHeroImage(Request $request , $id)
        {
            $settings = LandingPage::find($id);

            if (!is_null($settings)) {

                $settings = $settings->update([
                    'hero_image' => null,
                ]);

                if ($settings) {
                    $success = $request->session()->flash('success','Hero Image  Removed Successfully');
                    return back();

                }

            }else{
              return back()->withError('error','Something Went Wrong');  
            }

        }
    /*end::Admin Site Main Section*/
}
