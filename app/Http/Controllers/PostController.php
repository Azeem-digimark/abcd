<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //returns all the posts
    public function index(Request $request)
    {   
        if ($request->ajax()) {
            $data = Post::with('user', 'comments')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('view', function ($data) {
                    return '
                            <a href="'.route('posts.show', $data->id).'" class="btn btn-success btn-xs">View</a>';
                })
                ->addColumn('comments', function ($data) {
                    return $data->comments->count();
                })
                ->addColumn('price', function ($data) {
                    return $data->price .' '. $data->currency_type ;
                })   
                ->addColumn('edit', function ($data) {
                    if (Auth::user()->role_id == 1 || Auth::user()->role_id ==2) {
                        
                        return '
                                <a href="'.route('posts.edit', $data->id).'" class="btn btn-warning btn-xs">Edit</a>
                                ';
                    } else {
                        return '';
                    }
                    
                }) 
                ->addColumn('delete', function ($data) {
                    if (Auth::user()->role_id == 1) {
                                              
                        return '
                                <form action="'.route('posts.destroy', $data->id).'" method="POST" class="d-inline">
                                    '.csrf_field().'
                                    '.method_field('DELETE').'
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(\'Are you sure you want to delete this post?\')">Delete</button>
                                </form>';
                    } else {
                        return '';
                    }
                })                
                ->rawColumns(['view', 'edit', 'delete','comments'])
                ->make(true);
        }
        return view('posts.postListing');
    }

    public function create(Request $request)
    {
        return view('posts.addPost');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'currency' => ['required', 'string'],
            'content' => ['required', 'string'],
            'image' => ['required'],
        ]);

        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('images/posts'), $imageName);

        Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName,
            'price' => $request->price,
            'currency_type' => $request->currency,
        ]);

        return redirect()->route('posts.index')->with('msg', 'post created successfully!');
    }

    public function edit($postId)
    {
        $post = Post::find($postId);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'currency' => ['required', 'string'],
            'content' => ['required', 'string'],
        ]);
        
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/posts'), $imageName);
        }else{
            $imageName = $request->previousImage;
        }

        Post::where('id', $request->postId)->update(
            [
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imageName,
                'price' => $request->price,
                'currency_type' => $request->currency,
            ]
        );

        return redirect()->route('posts.index')->with('msg', 'post updated successfully!');
    }

    public function show($id)
    {   
        $this->updateViews($id);
        $post = Post::with('user', 'comments')->find($id);
        return view('posts.postDetails', compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('msg', 'Post deleted successfully');
    }

    public function updateViews($postId)
    {

        Post::where('id', $postId)->increment('views');

    }

}
