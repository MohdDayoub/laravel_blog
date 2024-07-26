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

<form action="{{route('dashboard.posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header text-center">
            <h5>Add New Author</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="title" class="form-label">Blog Title</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Blog Content</label>
                <textarea class="form-control" name="content" id="content" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Blog Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="mb-3">
                <label for="author_id" class="form-label">Blog's Author</label>
                <select name="author_id" id="" class="mt-2">
                    @foreach ($authors as $author)
                    <option value={{$author->id}}>{{$author->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-secondary w-50">Add blog</button>
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