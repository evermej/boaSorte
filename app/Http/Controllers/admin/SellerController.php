<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;

class SellerController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('can:admin.sellers.index')->only('index');
        $this->middleware('can:admin.sellers.create')->only('create', 'store');
        $this->middleware('can:admin.sellers.edit')->only('edit', 'update');
        $this->middleware('can:admin.sellers.destroy')->only('destroy');
        
    }   
    
    public function index()
    {
        // $users = User::simplePaginate(5);
        $users = User::all();
        return view('admin.sellers.index', compact('users'));
        // return view('admin.sellers.index');
    }

   
    public function create()
    {
        return view('admin.sellers.create');
    }

    
    public function store(UserRequest $request)
    {
        User::create($request->all());

        return redirect()->route('admin.sellers.create');
    }

    
    public function show($user)
    {
        [$user] = User::select(['id', 'name', 'email', 'profile_photo_path'])
            ->where('id', $user)->get();
       
        $role = $user->roles;
        return view('admin.sellers.show', compact('user', 'role'));
        
    }

   
    public function edit($user)
    {
        $roles = Role::all();

        [$user] = User::select(['id', 'name', 'email', 'profile_photo_path'])
            ->where('id', $user)->get();
        // return $user;

        return view('admin.sellers.edit', compact('user', 'roles'));
    }

    
    public function update(Request $request, $user)
    {
        $user = User::findOrFail($user);
        $user->update($request->all());
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.sellers.edit', $user);
        
    }

    
    public function destroy(User $user)
    {
        $name = $user->name;
        // $user->delete();
        
        return redirect()->route('admin.sellers.index')->with("message", "O REGISTRO $name  FOI APAGADO");
    }
}
