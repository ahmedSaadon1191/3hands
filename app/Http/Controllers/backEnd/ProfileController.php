<?php

namespace App\Http\Controllers\backEnd;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('backEnd.profile.edit');
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

            $user = Admin::find(auth()->user()->id);
            $user->update(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
          
           

            if ($request->hasFile('logo'))
            {

                Storage::disk('public')->delete('/backEnd/images/',$user->logo);
                $user->logo = $request->logo->store('admin_profile','public');
                $user->save();
            }

            DB::commit();
            return redirect()->back()->with(['success' => 'Admin Profile Updated Successfaly']);
       } catch (\Throwable $th) 
       {
           return $th;
           DB::rollback();
           return redirect()->back()->with(['error' => 'We Have A Global Error Please Try Again Later']);
       }


    }
}
