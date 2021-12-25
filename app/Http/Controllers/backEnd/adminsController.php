<?php

namespace App\Http\Controllers\backEnd;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class adminsController extends Controller
{
    public function index()
    {
        $admins = Admin::paginate(10);
        return view('backEnd.admins.index',compact('admins'));
    }

    public function create()
    {
        return view('backEnd.admins.create');
    }

    public function store(AdminRequest $request)
    {
        // return $request;
        try 
        {
            $create = Admin::create(
                [
                    'name'      => $request->name,
                    'email'     => $request->email,
                    'password'  => bcrypt($request->password),
                    'logo'      => 'person-icon.png' 
                ]);

                if ($request->hasFile('logo'))
                {
                    $create->logo = $request->logo->store('admins','public');
                    $create->save();
                    // $create->update(['logo' => $request->logo->store('admins','public')]);
                }

            return redirect()->route('admin.index')->with(['success' => 'Admin Created Successfaly']);

        } catch (\Throwable $th) 
        {
            return $th;
            return redirect()->route('admin.index')->with(['error' => 'We Have An Error Please Try Again']);
            
        }
    }


    public function edit($id)
    {
       try 
       {
           $admin = Admin::find($id);
           if ($admin) 
           {
                return view('backEnd.admins.edit',compact('admin'));

           } else 
           {
                return redirect()->back()->with(['error' => 'This Admin Not Found']);
           }
           
       } catch (\Throwable $th) 
       {

        return redirect()->route('admin.index')->with(['error' => 'We Have An Error Please Try Again']);
       }
    }

    public function update($id,AdminRequest $request)
    {
        try 
        {
            $admin = Admin::find($id);
            if ($admin) 
            {
                DB::beginTransaction();
                    $update = $admin->update(
                        [
                            'name'      => $request->name,
                            'email'     => $request->email,
                            'password'  => bcrypt($request->password),
                        ]);

                    if ($request->hasFile('logo'))
                    {
        
                        Storage::disk('public')->delete('/backEnd/images/',$admin->logo);
                        $admin->logo = $request->logo->store('admins','public');
                        $admin->save();
                    }
                DB::commit();
    
                return redirect()->route('admin.index')->with(['success' => 'Admin Created Successfaly']);

            } else 
            {
                return redirect()->back()->with(['error' => 'This Admin Not Found']);
            }

        } catch (\Throwable $th) 
        {
            DB::rollback();
            return redirect()->route('admin.index')->with(['error' => 'We Have An Error Please Try Again']);
            
        }
    }

    public function distroy($id)
    {
        // return $request;
        $admin = Admin::find($id);
        if ($admin) 
        {
            $delete = $admin->delete();
            return redirect()->route('admin.index')->with(['success' => 'Admin Deleted Successfaly']);

        } else 
        {
             return redirect()->back()->with(['error' => 'This Admin Not Found']);
        }
        
    }
}
