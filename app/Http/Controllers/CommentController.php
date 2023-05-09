<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class CommentController extends Controller
{   
    public function index(Request $request)
    {   
        if ($request->ajax()) {
            $data = Comment::with('user', 'post')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('dated', function ($data) {
                    return Carbon::parse($data->created_at)->format('F j, Y g:ia');
                })
                ->addColumn('delete', function ($data) {
                    if (Auth::user()->role_id ==1) {
                        return '
                                <form action="'.route('comments.destroy', $data->id).'" method="POST" class="d-inline">
                                    '.csrf_field().'
                                    '.method_field('DELETE').'
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(\'Are you sure you want to delete this comment?\')">Delete</button>
                                </form>';
                        
                    } else {
                        return '';
                    }
                    
                })
                ->addColumn('title', function ($data) {
                    return '<a href="'.route('posts.show', $data->post_id).'">'.$data->post->title.'</a>';
                })                
                ->rawColumns(['delete', 'dated', 'title'])
                ->make(true);
        }
        return view('comments.commentListing');
    }

    public function store(Request $request)
    {
        Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $request->postId,
            'body' => $request->comment,
            ]
        );

        return redirect()->back()->with('msg', 'Comment done successfully!');
    }

    public function destroy($id)
    {
        $post = Comment::findOrFail($id);
        $post->delete();

        return redirect()->route('comments.index')->with('msg', 'comment deleted successfully');
    }
}
