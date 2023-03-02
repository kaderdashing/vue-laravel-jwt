<?php

namespace App\Http\Controllers;

//use App\Models\EmployeeRecords;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class EmployeeRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|unique:users,email,' ,
            'password' => 'string|min:8',
        ]);  
                 $user = User::create([
                     'name' => $request->name,
                     'email' => $request->email,
                     'password' => Hash::make($request->password),
                     'remember_token' => Str::random(10),
                 ]);
         
                 event(new Registered($user));
         
         
         
         
                 return response()->json([
                    'response' => " vous avez créé un user" 
                    //'token' => $user->createToken(time())->plainTextToken
                 ]);
         
             


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
         $user = User::findOrFail($id);

           $request->validate([
                'name' => 'string|max:255',
                'email' => 'string|email|unique:users,email,'.$user->id,
       
            ]);  

            if ($request->filled('name')) {
                $user->name = $request->input('name');
            }
            if ($request->filled('email')) {
                $user->email = $request->input('email');
            }
        

/*
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
                */

                $user->save();

      return response()->json(['message' => 'User updated successfully.']);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

     public function destroy($id)
     {
         $user = User::findOrFail($id);
         $user->delete();
         return response()->json(['message' => 'Employee deleted successfully.']);
     }
}
