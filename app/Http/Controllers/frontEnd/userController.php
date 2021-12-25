<?php

namespace App\Http\Controllers\frontEnd;

use App\Models\Comment;
use App\Models\Articale;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;


class userController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function articalesIndex()
    {
        $articales = Articale::with('admin','category','comments')->get();
        $categories = Category::all();
        return view('frontEnd.articales.index',compact('articales','categories'));
    }

    public function create($id)
    {
        $articale = Articale::find($id);
        return view('frontEnd.comments.create',compact('articale'));
    }

    public function store(CommentRequest $request)
    {
        // return $request;
        try 
        {
            $create = Comment::create(
                [
                    'comment'           => $request->comment,
                    'user_id'           => auth()->user()->id,
                    'articale_id'       => $request->articale_id,
                    'logo'              => auth()->user()->logo,
                ]);

            return redirect()->route('user.comment.show',$request->articale_id)->with(['success' => 'Comment Created Successfaly']);

        } catch (\Throwable $th) 
        {
            return $th;
            return redirect()->route('home')->with(['error' => 'We Have An Error Please Try Again']);
        }
    }

    public function show($id)
    {
        $articale = Articale::with('admin','category','comments')->orderBy('created_at', 'desc')->find($id);
        // return $articales;
        return view('frontEnd.comments.show',compact('articale'));
    }

    public function edit($id)
    {
        $comment = Comment::with('admin','user','articale')->find($id);
        return view('frontEnd.comments.edit',compact('comment'));
    }

    public function update($id,CommentRequest $request)
    {
        // return $request;
        try 
        {
            $comment = Comment::find($id);
            $articale = $comment->articale->id;
            // return $articale;
           
                $update = $comment->update(
                    [
                        'comment'           => $request->comment,
                    ]);

            return redirect()->route('user.comment.show',$articale)->with(['success' => 'Comment Updated Successfaly']);

        } catch (\Throwable $th) 
        {
            return $th;
            return redirect()->route('home')->with(['error' => 'We Have An Error Please Try Again']);
        }
    }

    public function delete($id)
    {
         // return $request;
         try 
         {
             $comment = Comment::find($id);
             $articale = $comment->articale->id;
             // return $articale;
            
                $comment->delete();
 
             return redirect()->route('user.comment.show',$articale)->with(['success' => 'Comment Deleted Successfaly']);
 
         } catch (\Throwable $th) 
         {
             return $th;
             return redirect()->route('home')->with(['error' => 'We Have An Error Please Try Again']);
         }
    }

    public function search(Request $request)
    {
        $results        = '';
        $search2        = $_GET['filter'];
        $query          = Articale::where('category_id',$search2)->with('comments','category','admin')->get();
        $total_row      = $query->count();

        if ($total_row > 0)
        {

            foreach ($query as $articale) 
            {
                // return $row->id;
                $results .= '
                <div class="row g-0 justify-content-end justify-content-md-around align-items-start timeline-nodes">

                    <div class="col-9 col-md-5 me-md-4 me-lg-0 order-3 order-md-1 timeline-content bg-white shadow-lg">
                        <h3 class=" text-light">'. $articale->title .'</h3>
                        <p>'. $articale->content .'</p>

                        <div class="padding p-5" style="float: left">
                            <a href="/User/comments/create/'. $articale->id .'" class="btn btn-success">Create Comment</a>
                            <a href="/User/comments/show/'. $articale->id .'" class="btn btn-info">Show More</a>
                        </div
                        <div class="padding2 p-5">
                            <strong style="float: right">'. $articale->comments->count() .'<strong>Comments</strong></strong>
                        </div>
                    </div

                    <div class="col-3 col-sm-1 order-2 timeline-icons text-md-center">
                        <i class="bi-patch-check-fill timeline-icon"></i>
                    </div>

                    <div class="col-9 col-md-5 ps-md-3 ps-lg-0 order-1 order-md-3 py-4 timeline-date">
                        <time>'.  $articale->created_at.'</time>
                    </div>

                    <div class="col-9 col-md-5 ps-md-3 ps-lg-0 order-1 order-md-3 py-4 timeline-date">
                        <time><strong>Category Name :</strong>'.  $articale->category->name .'</time>
                    </div>

                </div>
                   
                  ';
            }
            
        }else
        {
            
            $results = '
                    <h1 class="text-center">No Articales In This Category</h1>
                ';
        }

        $products = array
        (
            'table_data' => $results,
        );

        return json_encode($products);
    }

    public function logout()
    {
        \auth()->guard('web')->logout();
        return redirect()->route('welcome');
    }
}
