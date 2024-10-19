<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{


    public function AdminDashboard()
    {
        $sessions = Session::all();

        return view('admin.index',compact('sessions'));

    } // End Method

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'info'
        );

        return redirect('/login')->with($notification);
    } // End Method

    public function AdminLogin()
    {
        return view('admin.login');
    } // End Method


    public function AdminProfile()
    {

        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_view', compact('editData'));
    } // End Method


    public function AdminProfileStore(Request $request)
    {

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        // $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method

    public function AdminChangePassword()
    {

        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    } // End Method


    public function AdminPasswordUpdate(Request $request)
    {

        /// Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, auth::user()->password)) {

            $notification = array(
                'message' => 'Old Password Does not Match!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        /// Update The new Password
        User::whereId(auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    } // End Method



    public function UpdateUserStatus(Request $request)
    {

        $userId = $request->input('user_id');
        $isChecked = $request->input('is_checked', 0);

        $user = User::find($userId);
        if ($user) {
            $user->status = $isChecked;
            $user->save();
        }

        return response()->json(['message' => 'User Status Updated Successfully']);
    } // End Method




    /// Admin User All Method ////////////

    public function AllAdmin()
    {

        $alladmin = User::where('role', 'admin')->get();
        return view('admin.backend.pages.admin.all_admin', compact('alladmin'));
    } // End Method

    public function AddAdmin()
    {
        $roles = Role::all();
        return view('admin.backend.pages.admin.add_admin', compact('roles'));
    } // End Method


    // public function StoreAdmin(Request $request)
    // {
    //     $user = new User();
    //     // $user->genre = $request->genre;
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->phone = $request->phone;
    //     $user->address = $request->address;
    //     $user->password = Hash::make($request->password);
    //     $user->role = 'admin';
    //     $user->status = '1';
    //     $user->save();

    //     if ($request->roles) {
    //         // Rechercher le nom du rôle en fonction de l'identifiant fourni
    //         $role = \Spatie\Permission\Models\Role::findById($request->roles);
    //         if ($role) {
    //             $user->assignRole($role->name);
    //         } else {
    //             $notification = array(
    //                 'message' => 'Rôle non trouvé',
    //                 'alert-type' => 'error'
    //             );
    //             return redirect()->route('all.admin')->with($notification);
    //         }
    //     }

    //     $notification = array(
    //         'message' => 'Nouveau administrateur inséré avec succès',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->route('all.admin')->with($notification);
    // }

    public function StoreAdmin(Request $request)
    {
        $user = new User();
        // $user->genre = $request->genre;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = '1';
        $user->save();

        if ($request->roles) {
            // Rechercher le nom du rôle en fonction de l'identifiant fourni
            $role = Role::findById($request->roles);
            if ($role) {
                $user->assignRole($role->name);
            } else {
                $notification = array(
                    'message' => 'Rôle non trouvé',
                    'alert-type' => 'error'
                );
                return redirect()->route('all.admin')->with($notification);
            }
        }

        $notification = array(
            'message' => 'Nouveau administrateur inséré avec succès',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin')->with($notification);
    }


    public function EditAdmin($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.backend.pages.admin.edit_admin', compact('user', 'roles'));
    } // End Method



    public function UpdateAdmin(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            $notification = array(
                'message' => 'Utilisateur non trouvé',
                'alert-type' => 'error'
            );
            return redirect()->route('all.admin')->with($notification);
        }

        // $user->genre = $request->genre;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = '1';
        $user->save();

        $user->roles()->detach();

        if ($request->roles) {
            // Rechercher le nom du rôle en fonction de l'identifiant fourni
            $role = \Spatie\Permission\Models\Role::findById($request->roles);
            if ($role) {
                $user->assignRole($role->name);
            } else {
                $notification = array(
                    'message' => 'Rôle non trouvé',
                    'alert-type' => 'error'
                );
                return redirect()->route('all.admin')->with($notification);
            }
        }

        $notification = array(
            'message' => 'Admin mis à jour avec succès',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin')->with($notification);
    }


    public function DeleteAdmin($id)
    {

        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }
        $notification = array(
            'message' => 'Admin Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method
}
