<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\{Auth,Hash};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProfileController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $this->authorizeResource(User::class, 'view');
        $users = Auth::user();
        return view('backend.pages.profile', compact('users'));
    }
    public function update(Request $request, User $user)
    {
        $this->authorizeResource(User::class, 'view');
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255'
        ]);
        User::where('id', Auth::user()->id)->update($validatedData);
        return redirect()->back()->with('success', 'Data berhasil diubah.');
    }
    
    public function updatePassword(Request $request, User $user)
    {
        $this->authorizeResource(User::class, 'view');
        if (!(Hash::check($request->get('current-password'), Auth::User()->password))) {
            return redirect()->back()->with("error","Password anda tidak cocok dengan password saat ini.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error","Password baru tidak boleh sama dengan password saat ini");
        }
        $validateDate = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|min:5|confirmed',
        ]);
        $User = Auth::User();
        $User->password = bcrypt($request->get('new-password'));
        $User->save();
        return redirect()->back()->with('success', 'Password berhasil diubah.');
    }
}