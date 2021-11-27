<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\ProfileUpdate;
use App\Http\Requests\Setting\SettingUpdate;
use App\Models\Profile;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function allusers()
    {
        return view('admin.allusers')->with('users', User::orderby("created_at")->get());
    }
    public function makeAsAdmin(User $user)
    {
        $user->role = "admin";
        $user->save();
        session()->flash('success', "User Is Admin Now.");
        return redirect()->back();
    }
    public function removeAdmin(User $user)
    {
        $user->role = "writer";
        $user->save();
        session()->flash('success', "User Is Not Admin Any More.");
        return redirect()->back();
    }
    public function profile(Profile $profile)
    {
        return view('admin.profile', [
            'profile' => $profile,
        ]);
    }
    public function profileEdit(Profile $profile)
    {
        return view('admin.profileedit', [
            'profile' => $profile,
        ]);
    }
    public function profileUpdate(ProfileUpdate $request, Profile $profile)
    {
        // dd($request->hasFile('gravater'));
        if ($request->hasFile('gravater')) { // it checks if the file has been changed
            $image =  $request->gravater->store('profile_gravater'); //
            $request->gravater = $image;
            Storage::delete($profile->gravater);
        } else {
            $request->gravater = $profile->gravater;
        }
        $profile->update([
            "about" => $request->about,
            "gravater" => $request->gravater,
            "facebook" => $request->facebook,
            "youtube" => $request->youtube,
        ]);
        $profile->admin->update([
            'name' => $request->username,
        ]);
        session()->flash('success', 'Profile Updated');
        return redirect()->back();
    }
    public function settingEdit(Setting $setting)
    {
        return view('admin.setting')->with('setting', $setting);
    }
    public function settingUpdate(SettingUpdate $request, Setting $setting)
    {
        // dd($request->all());
        $setting->update([
            'site_name' => $request->site_name,
            "contact_number" => $request->contact_number,
            "contact_email" => $request->contact_email,
            "addres" => $request->addres,
            "about" => $request->about
        ]);
        session()->flash('success', 'Setting Updated');
        return redirect()->back();
    }
}
