<?php

namespace App\Http\Controllers\backEnd;

use App\Models\Comment;
use App\Models\Articale;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticateRequest;

class articalsController extends Controller
{
    public function index()
    {
        $articales = Articale::with('admin','category')->paginate(10);
        return view('backEnd.articales.index',compact('articales'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backEnd.articales.create',compact('categories'));
    }

    public function store(ArticateRequest $request)
    {
        // return $request;
        try 
        {
            $create = Articale::create(
                [
                    'title'         => $request->title,
                    'content'       => $request->content,
                    'admin_id'      => auth()->user()->id,
                    'category_id'   => $request->category_id,
                ]);

            return redirect()->route('articale.index')->with(['success' => 'Articale Created Successfaly']);

        } catch (\Throwable $th) 
        {
            return $th;
            return redirect()->route('articale.index')->with(['error' => 'We Have An Error Please Try Again']);
        }
    }


    public function edit($id)
    {
       try 
       {
           $categories  = Category::all();
           $articale    = Articale::find($id);
           if ($categories) 
           {
                return view('backEnd.articales.edit',compact('categories','articale'));

           } else 
           {
                return redirect()->back()->with(['error' => 'This Articale Not Found']);
           }
           
       } catch (\Throwable $th) 
       {
        return $th;
        return redirect()->route('articale.index')->with(['error' => 'We Have An Error Please Try Again']);
       }
    }

    public function update($id,ArticateRequest $request)
    {
        try 
        {
            $articale = Articale::find($id);
            if ($articale) 
            {
                $update = $articale->update(
                    [
                        'title'         => $request->title,
                        'content'       => $request->content,
                        'admin_id'      => auth()->user()->id,
                        'category_id'   => $request->category_id,
                    ]);
    
                return redirect()->route('articale.index')->with(['success' => 'Articale Created Successfaly']);

            } else 
            {
                return redirect()->back()->with(['error' => 'This Articale Not Found']);
            }

        } catch (\Throwable $th) 
        {
            // return $th;
            return redirect()->route('articale.index')->with(['error' => 'We Have An Error Please Try Again']);
            
        }
    }

    public function show($id)
    {
        $articale = Articale::with('admin','category')->find($id);
        $comments = Comment::where('articale_id',$articale->id)->with('admin','user','articale')->get();
        return view('backEnd.articales.show',compact('articale','comments'));
    }

    public function distroy($id)
    {
        $articale = Articale::with('comments')->find($id);
       
        
        if ($articale) 
        {
            if (isset($articale->comments) && $articale->comments->count() > 0) 
            {
                 $articale->comments()->delete();
                 $articale->delete();
                
            } else 
            {
                $articale->delete();
            }
            return redirect()->route('articale.index')->with(['success' => 'Category Deleted Successfaly']);

        } else 
        {
             return redirect()->back()->with(['error' => 'This Admin Not Found']);
        }
        
    }

   
}
