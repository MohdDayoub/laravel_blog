@extends('admin.layout')

@section('main')

<h2>Blogs List</h2>

@foreach($blogs as $blog)
    <p>{{$blog->title}}</p>
@endforeach

@endsection
