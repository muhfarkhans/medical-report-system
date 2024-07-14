<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get();

        return view('user.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|string|max:255',
            'birth' => 'required|date',
            'phone' => 'required|numeric|digits_between:10,15',
            'blood_type' => 'nullable',
            'gender'=> 'required|string',
        ];

        $messages = [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'address.required' => 'The address field is required.',
            'birth.required' => 'The birth date field is required.',
            'birth.date' => 'The birth date must be a valid date.',
            'phone.required' => 'The phone number field is required.',
            'phone.numeric' => 'The phone number must be a valid number.',
            'phone.digits_between' => 'The phone number must be between 10 and 15 digits.',
            'gender.required' => 'The gender field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->phone),
            'role' => 'user'
        ]);

        UserProfile::create([
            'user_id' => $user->id,
            'address' => $request->input('address'),
            'birth' => $request->input('birth'),
            'phone' => $request->input('phone'),
            'blood_type' => $request->input('blood_type'),
            'gender' => $request->input('gender'),
        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', ['user'=> $user]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'address' => 'required|string|max:255',
            'birth' => 'required|date',
            'phone' => 'required|numeric|digits_between:10,15',
            'blood_type' => 'nullable',
            'gender'=> 'required|string',
        ];

        $messages = [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'address.required' => 'The address field is required.',
            'birth.required' => 'The birth date field is required.',
            'birth.date' => 'The birth date must be a valid date.',
            'phone.required' => 'The phone number field is required.',
            'phone.numeric' => 'The phone number must be a valid number.',
            'phone.digits_between' => 'The phone number must be between 10 and 15 digits.',
            'gender.required' => 'The gender field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        UserProfile::where('user_id', $id)->update([
            'address' => $request->input('address'),
            'birth' => $request->input('birth'),
            'phone' => $request->input('phone'),
            'blood_type' => $request->input('blood_type'),
            'gender' => $request->input('gender'),
        ]);

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function delete($id)
    {
        UserProfile::where('user_id', $id)->delete();
        User::where('id', $id)->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
