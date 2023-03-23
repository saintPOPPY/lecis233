<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Validation\Rules;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;


use \App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): Response
    {
        $users = User::paginate(10);
        return response(view('users.index', ['users' => $users]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('create', User::class)){
            return redirect()->route('users.index')->with('error', 'You do not have permission.');
        }

        $user = new User;
        return response(view('users.create', ['user' => $user])->with('success', 'User was created'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response 
     * 
     */
    public function store(Request $request): RedirectResponse
    {
        $user = User::create($this->validateData($request));
        event(new Registered($user));

        // Auth::login($user);
        return redirect()->route('users.index')->with('success', 'User was created successfully');
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function show(string $id): Response
    {   
        $user = User::with('reviews')->findOrFail($id);
        return response(view('users.show', ['user' => $user]));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id): Response
    {
        $user = User::findOrFail($id);
        return response(view('users.edit', ['user' => $user]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        User::find($id)->update($this->validateData($request));
        return redirect()->route('users.index')->with('success', 'User was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User was deleted');
    }

    private function validateData($request) {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);
    }
}
