<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Authors;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blogs::leftJoin('authors', 'authors.id', '=', 'blogs.author_id')
            ->select('blogs.*', 'authors.name as author_name')
            ->get();

        return  View('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = DB::table('authors')->get();

        return  View('admin.blogs.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        try {

            Blogs::create([
                'title' => $request->title,
                'content' => $request->content,
                'author_id' => $request->author_id,
                'image' => $request->image,
            ]);

            return back()->with('success', 'The Blog has inserted successfully');
        } catch (Exception $e) {

            return back()->withErrors(['error' => 'something happend']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blogs::find($id);
        $authors = Authors::get();

        return view('admin.blogs.edit', compact('blog', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, $id)
    {
        // dd($blog);
        // dd($blog->title);
        // dd($request->title);

        $blog = Blogs::find($id);
        
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->author_id = $request->author_id;

        if ($request->image != null) {
            $blog->image = $request->image;
        }

        $blog->save();
        return back()->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'destroy';
    }
}
