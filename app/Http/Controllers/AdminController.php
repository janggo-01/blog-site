<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = [
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        ];

        return redirect('/login')->with($notification);
    }


    public function Profile()
    {
        $id                 = Auth::user()->id;
        $data['profile']    = User::find($id);

        return view('admin.Admin-profile', $data);
    }

    public function EditProfile()
    {
        $id                 = Auth::user()->id;
        $data['profile']    = User::find($id);

        return view('admin.Admin-profile-edit', $data);
    }

    public function StoreProfile(Request $request)
    {
        $id      = Auth::user()->id;
        $data    = User::find($id);
        
        $data->name     = $request->name;
        $data->username = $request->username;
        $data->email    = $request->email;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            $fileName = date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('allimages/admin'), $fileName);
            $data['profile_image'] = $fileName;
        } 

        $data->save();
        //notification toastr
        $notification = [
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.Admin-profile')->with($notification);
        
    }

    public function ChangePassword()
    {
        return view('admin.Admin-change-password');
    }

    public function UpdatePassword(Request $request)
    {
        $validate = $request->validate([
            'OldPassword' => 'required',
            'NewPassword' => 'required',
            'NewPasswordConfirmation' => 'required|same:NewPassword',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->OldPassword, $hashedPassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->NewPassword);
            
            $users->save();

            session()->flash('message', 'Password Updated Succesfully');

            return redirect()->back();
        } else {
            session()->flash('message', 'Old password is not match');
        }
        
    }

}
