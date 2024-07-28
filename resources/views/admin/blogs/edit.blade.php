@extends('admin.layout')

@section('cssAndJs')
<link rel="stylesheet" href="{{asset('filepond/filepond.min.css')}}">
<script src="{{asset('filepond/filepond.min.js')}}"></script>
@endsection

@section('main')

@if($errors->any())
<ol>
    @foreach($errors->all() as $error)
    <li style="color: red;font-size: 28px">{{$error}}</li>
    @endforeach
</ol>
@endif

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

<form action="{{route('dashboard.posts.update',[$blog->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card">
        <div class="card-header text-center">
            <h5>Add New Author</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="title" class="form-label">Blog Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{$blog->title}}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Blog Content</label>
                <textarea class="form-control" name="content" id="content" rows="3">{{$blog->content}}</textarea>
            </div>
            <div class="mb-3">
                <div class="row m-0">
                    <div class="col-10">
                        <label for="name" class="form-label">Blog Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <div class="col-2">
                        Current Image
                        <img src="{{url('storage/media/'.$blog->image)}}" alt="" style="width:100px;height:100px;object-fit:cover">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="author_id" class="form-label">Blog's Author</label>
                <select name="author_id" id="" class="mt-2">
                    @foreach ($authors as $author)
                    <!-- @if ($author->id == $blog->author_id)
                    <option selected value={{$author->id}}>{{$author->name}}</option>
                    @else
                    <option value={{$author->id}}>{{$author->name}}</option>
                    @endif -->
                    <option value={{$author->id}} @if($author->id == $blog->author_id) selected @endif>
                        {{$author->name}}
                    </option>

                    @endforeach
                </select>
            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-secondary w-50">Update blog</button>
            </div>
        </div>
    </div>
</form>

<script>
    const inputElement = document.querySelector('input[id="image"]');
    const pond = FilePond.create(inputElement);

    FilePond.setOptions({
        server: {
            url: '/dashboard/upload',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
    });
</script>
@endsection