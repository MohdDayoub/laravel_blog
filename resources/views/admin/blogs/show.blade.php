@extends('admin.layout')

@section('main')

<div>
    <!-- <form method="post" action="{{ route('dashboard.posts.destroy',[$blog->id]) }}" style="margin:20px auto;padding:10px; display:flex;gap:20px">
        @CSRF
        @method('delete') -->

    <div>
        <img src="{{url('storage/media/'.$blog->image)}}" alt="" style="width:300px;height:300px;object-fit:cover">
        <div class="btns">
            <a class="btn btn-success my-2 mr-2" href="{{route('dashboard.posts.edit',$blog->id)}}">edit </a>

            <!-- <button class="btn btn-danger  my-2" type=" submit" style="">Delete</button> -->
        </div>
    </div>
    <div>
        <h2 class="mb-4">{{$blog->title}}</h2>
        <p>{{$blog->content}}</p>
        <p>{{$blog->author_name?"created by: ".$blog->author_name:""}}</p>
    </div>
    <!-- </form> -->

</div>

@endsection