<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $request->search = preg_replace("/[^A-Za-z0-9]/", "", $request->search ?? '');
        $users = User::where('fullname', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'desc')->get();

        return view('user.index', [
            'users' => $users,
            'search' => $request->search
        ]);
    }

    public function create(Request $request)
    {
        $requestMethod = $request->method();
        switch ($requestMethod) {
            case 'GET':
                return view('user.create');
            case 'POST':
                $request->validate([ // TODO: create add add validation method, avoid repeating code
                    'fullname' => 'required',
                    'email' => 'required|email',
                ]);

                return User::createUser($request->only(['fullname', 'email']));
        }
    }

    public function update(Request $request, int $id)
    {
        $requestMethod = $request->method();
        if ($requestMethod === 'GET') {
            $user = User::findOrFail($id);
            return view('user.edit', ['user' => $user]);
        } else if ($requestMethod === 'PUT') {
            $request->validate([ // TODO: create add add validation method, avoid repeating code
                'fullname' => 'required',
                'email' => 'required|email',
            ]);

            return User::updateUser($request);
        }
    }

    public function delete(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index');
    }
}
