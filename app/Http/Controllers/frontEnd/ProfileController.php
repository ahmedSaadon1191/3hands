<?php

namespace App\Http\Controllers\frontEnd;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('frontEnd.profile.edit');
    }

    

    public function update(Request $request)
    {
        // return $request;
       try 
       {
            $this->validate($request,
            [
                'name'                  => ['required', 'string', 'max:255'],
                'email'                 => ['required', 'string', 'email', 'max:255'],
                'password'              => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            DB::beginTransaction();

            $user = User::find(auth()->user()->id);
            $user->update(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
          
           

            if ($request->hasFile('logo'))
            {

                Storage::disk('public')->delete('/backEnd/images/',$user->lofo);
                $user->logo = $request->logo->store('user_profile','public');
                $user->save();
                // $user->update(['logo' => $request->logo->store('user_profile','public')]);
            }

            DB::commit();
            return redirect()->back()->with(['success' => 'User Profile Updated Successfaly']);
       } catch (\Throwable $th) 
       {
           return $th;
           DB::rollback();
           return redirect()->back()->with(['error' => 'We Have A Global Error Please Try Again Later']);
       }


    }
}
