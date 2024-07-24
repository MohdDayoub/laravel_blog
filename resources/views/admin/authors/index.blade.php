@extends('admin.layout')

@section('main')

    <a class="btn btn-secondary" href="{{ url('/dashboard/authors/create') }}">اضافة كاتب</a>


    <table class="table">

        <tr>
            <th scope="col">الصورة</th>
            <th scope="col">الاسم</th>
            <th scope="col">الوصف</th>
        </tr>

        @foreach($authors as $author)
            <tr>
                <td><img src="{{url('/storage/media/'.$author->image)}}" style="width: 200px"></td>
                <td>{{$author->name}}</td>
                <td>{{$author->description}}</td>
            </tr>
        @endforeach

    </table>

@endsection

