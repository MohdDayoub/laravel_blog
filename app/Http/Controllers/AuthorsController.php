<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Mockery\Exception;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Authors::get();

        return view('admin.authors.index',compact('authors'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        try{

            //insert to db
            Authors::create([
                'name' => $request->name,
                'description' => $request->des,
                'image' => $request->image,
            ]);

            return back()->with('success','The Author has inserted successfully');
        }
        catch (Exception $e){

            return back()->withErrors(['error' => 'something happend']);
        }





    }

    /**
     * Display the specified resource.
     */
    public function show(Authors $authors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Authors $authors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Authors $authors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Authors $authors)
    {
        //
    }
}
