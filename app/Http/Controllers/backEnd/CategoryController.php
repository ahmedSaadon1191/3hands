<?php

namespace App\Http\Controllers\backEnd;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('admin')->paginate(10);
        return view('backEnd.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('backEnd.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        // return $request;
        try 
        {
            $create = Category::create(
                [
                    'name'      => $request->name,
                    'admin_id'   => auth()->user()->id,
                ]);

            return redirect()->route('category.index')->with(['success' => 'category Created Successfaly']);

        } catch (\Throwable $th) 
        {
            return $th;
            return redirect()->route('category.index')->with(['error' => 'We Have An Error Please Try Again']);
            
        }
    }


    public function edit($id)
    {
       try 
       {
           $category = Category::find($id);
           if ($category) 
           {
                return view('backEnd.categories.edit',compact('category'));

           } else 
           {
                return redirect()->back()->with(['error' => 'This Category Not Found']);
           }
           
       } catch (\Throwable $th) 
       {

        return redirect()->route('category.index')->with(['error' => 'We Have An Error Please Try Again']);
       }
    }

    public function update($id,CategoryRequest $request)
    {
        try 
        {
            $category = Category::find($id);
            if ($category) 
            {
                $update = $category->update(
                    [
                        'name'      => $request->name,
                        'admin_id'  => auth()->user()->id 
                    ]);
    
                return redirect()->route('category.index')->with(['success' => 'Category Created Successfaly']);

            } else 
            {
                return redirect()->back()->with(['error' => 'This ategory Not Found']);
            }

        } catch (\Throwable $th) 
        {
            // return $th;
            return redirect()->route('category.index')->with(['error' => 'We Have An Error Please Try Again']);
            
        }
    }

    public function distroy($id)
    {
        // return $request;
        $category = Category::with('articales')->find($id);
        // return $category;
       
        
        if ($category) 
        {
            if (isset($category->articales) && $category->articales->count() > 0) 
            {
                 $category->articales()->delete();
                 $category->delete();
                
            } else 
            {
                $category->delete();
            }
            return redirect()->route('admin.index')->with(['success' => 'Category Deleted Successfaly']);

        } else 
        {
             return redirect()->back()->with(['error' => 'This Admin Not Found']);
        }
        
    }
}
