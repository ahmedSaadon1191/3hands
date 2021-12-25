<?php

namespace App\Http\Controllers\backEnd;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{
    public function store(CommentRequest $request)
    {
        // return $request;
        try 
        {
            $create = Comment::create(
                [
                    'comment'       => $request->comment,
                    'admin_id'      => auth()->user()->id,
                    'articale_id'   => $request->articale_id,
                ]);

            



                $results        = '';
                $data           = $request->comment;            
                $query          = $create;
                $logo           = $create->admin->logo; 
                $img            = asset("backEnd/images/$logo");
                // return $img;
             
                   
                           
                        
            $results .= '
            
            <div class="card border border-info" >
                <div class="tim-typo pt-5">
                    <h4>
                        <span>
                            '. $query->admin->name .'

                            <img src="'. $img .'")"
                            alt="" style="height: 50px; width:50px; margin:10px">
                        </span>
                        '.$query->comment.'
                    </h4>
                </div>

                <div class="card-footer" id="replay_btn">
                    <a href="#pablo" class="btn btn-primary btn-round"
                        id="create_replay_btn">Replay</a>
                    <p style="color: #7a7a7a">Created At <br>'. $query->created_at .'</p>
                </div>
                
            </div>';
                            
                    
            
            $create = array
            (
                'table_data' => $results,
            );
            
                    return json_encode($create);

        } catch (\Throwable $th) 
        {
            return $th;
            return redirect()->route('articale.index')->with(['error' => 'We Have An Error Please Try Again']);
        }
    }


    public function update(Request $request ,$id)
    {
        // return $request;
        try 
        {
            $comment = Comment::find($id);
            if ($comment) 
            {
                $update = $comment->update(
                    [
                        'comment'       => $request->comment,
                        'admin_id'      => auth()->user()->id,
                        
                    ]);
    
                return redirect()->route('articale.show',$request->articale_id)->with(['success' => 'Comment Updated Successfaly']);

            } else 
            {
                return redirect()->back()->with(['error' => 'This Comment Not Found']);
            }

        } catch (\Throwable $th) 
        {
            return $th;
            return redirect()->route('articale.show',$request->articale_id)->with(['error' => 'We Have An Error Please Try Again']);
            
        }
    }


    public function distroy($id)
    {
        try 
        {
             // return $request;
            $comment = Comment::find($id);
            if ($comment) 
            {
                $delete = $comment->delete();
                return redirect()->back()->with(['success' => 'Comment Deleted Successfaly']);

            } else 
            {
                return redirect()->back()->with(['error' => 'This Admin Not Found']);
            }

        } catch (\Throwable $th) 
        {
            return $th;
            return redirect()->route('articale.show',$request->articale_id)->with(['error' => 'We Have An Error Please Try Again']);
        }
    }
}
