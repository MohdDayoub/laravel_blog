

@if($errors->any())
    <ol>
    @foreach($errors->all() as $error)
        <li style="color: red;font-size: 28px">{{$error}}</li>
    @endforeach
    </ol>
@endif

<form action="{{ route('posts.store') }}" method="post">
    @CSRF
    <p>Title</p>
    <p><input type="text" name="title" style="width: 50%;"></p>
    <p>Content</p>
    <p><textarea name="content" cols="80" rows="5" ></textarea></p>
    <p><button type="submit">Add Post</button> </p>
</form>
