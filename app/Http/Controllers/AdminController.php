<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index()
    {
        if(Auth::check())
            return view('admin.index');
        else
            return redirect('/admin/login');
    }

    public function test() {
        return view('welcome');
    }

    public function login_get(){
        if(!Auth::check())
            return view('admin.login');
        else
            return redirect('/admin');
    }


    public function logout() {
        if(Auth::check()){
            Auth::logout();
            return redirect('/admin/login');
        } else
            return redirect('/admin');
    }

    public function login_post(Request $req){
        $user = User::where(['email' => request('email')])->first();
        $flag = false;
        if(!request('email')) {
            return redirect('/admin/login')->with('error', 'Invalid Email');
        }
        if(!request('password')) {
            return redirect('/admin/login')->with('error', 'Invalid Password');
         }
        // if($user->verification_code) {
        //     $flag = true;
        // }
        if(!$flag)
        {
            if(auth()->attempt(['email' => request('email'), 'password' => request('password'), 'is_admin' => 1])) {
                return redirect('/admin');
            } else {
                return redirect('/admin/login')->with('error', 'Invalid Email or Password');
            }
        } else {
            return redirect('/admin/login')->with('error', 'Email is not Verified');
        }
    }
    public function showUser(){
        $users = User::latest()->paginate(15);
        return view('admin.user',compact('users'));
    }

    public function createUser(){
        return view('admin.createuser');
    }

    public function addUser(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required'],
            'phone' => ['required', 'unique:users'],
        ],
    [
        'name.required => Please Enter Name',
        'email.required => Please Enter Email',
        'phone.required => Please Enter Phone Number'
    ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->referral_code = $request->referral_code;
        $user->save();

        return redirect('users')->with('success', 'Registration Successfull');


    }

    public function editUser($id){
            $user = User::find($id);
            return view('admin.editUser',compact('user'));
    }

    public function updateUser($id, Request $request){
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ];
        if(!empty($request->password)){
            if($request->password == $request->confirm_password){
                $data['password'] = Hash::make($request->password);
            }
            else{
                return redirect()->back()->with('error','Password does not match');
            }
        }
        $user = User::find($id)->update($data);

        return redirect('users')->with('success','Update Successful');
    }

    public function removeUser($id){
        $user = User::find($id)->forceDelete();
        return redirect('users')->with('success', 'User Deleted!');
    }

    public function changePasswordView(){
        return view('admin.changePassword');
        }
    public function changePassword($id, Request $request){
    if(Auth()->user()->id == $id){
        $validate = $request->validate([
            'new_password' => ['required' , 'min:6', 'confirmed']
        ]);
        $password = Hash::make($request->new_password);
        $user = User::find($id);
        $user->password = $password;
        $user->save();
        return redirect('users/changePass/'.$id)->with('success', 'Password Updated!');

    }
    else{
        return redirect('users')->with('error', 'Please Login to Change Password!');

    }

    }

}
