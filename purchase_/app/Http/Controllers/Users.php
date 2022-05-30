<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'user'
        ]);
        return redirect()->route('Users.index')
        ->with('success','New user has been canceled successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('user_edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hashedPassword = Auth::user()->password;
 
        if (Hash::check($request->old_password, $hashedPassword )) {
 
            if (!Hash::check($request->new_password, $hashedPassword)) {
 
                $users = User::find(Auth::user()->id_user);
                $users->password = bcrypt($request->new_password);
                User::where( 'id_user' , Auth::user()->id_user)->update( array( 'password' =>  $users->password));
    
                return redirect()->route('Users.index')
                ->with('success','Password changed');
            }
 
            else{
                return redirect()->route('Users.index')
                ->with('error','Password can\'t change');
            }
 
           }
 
        else{
            return redirect()->route('Users.index')
            ->with('error','Password didn\'t match');
        }

        $user = auth()->user();
        if (Hash::check($request->password, $user->password)) { 
            $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            );
            $users = User::find($id);
            $users->update($data);
         
         } else {
            return redirect()->route('Users.index')
            ->with('error','Password didn\'t match');
         }
    }

    public function delete($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->route('Users.index')
            ->with('error','User deleted succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
