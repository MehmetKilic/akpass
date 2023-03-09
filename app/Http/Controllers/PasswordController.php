<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordStoreRequest;
use App\Models\Category;
use App\Models\Password;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param PasswordStoreRequest $request
     * @return RedirectResponse
     */
    public function store(PasswordStoreRequest $request)
    {
        // Add authenticate user id
        $request->request->add(['user_id' => Auth::user()->getAuthIdentifier()]);

        // Password Hash
        $password = $request->get('password');
        $request->request->set('password', Crypt::encrypt($password));

        Password::updateOrCreate([
            'url' => $request->get('url'),
            'username' => $request->get('username'),
        ], [
            'user_id' => $request->get('user_id'),
            'category_id' => $request->get('category_id'),
            'title' => $request->get('title'),
            'username' => $request->get('username'),
            'password' => $request->get('password')
        ]);

        return redirect()->route('home')->with('success', 'The operation completed successfully.');
    }

    public function show($id)
    {
        $getData = Password::where('id', $id)->firstOrFail();
        $allCategory = Category::where('status', 1)->get();

        return view('password.edit', [
            'data' => $getData,
            'categories' => $allCategory
        ]);
    }

    public function delete($id)
    {
        $getData = Password::where('id', $id)->firstOrFail();
        $getData->delete();
        return redirect()->route('home')->with('success', 'Data deleted successfully.');
    }
}