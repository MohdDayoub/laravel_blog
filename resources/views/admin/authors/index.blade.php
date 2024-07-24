@extends('admin.layout')

@section('main')

<a class="btn btn-secondary" href="{{ url('/dashboard/authors/create') }}">اضافة كاتب</a>


<table id="myTable" class="display">

    <thead>
        <tr>
            <th scope="col">الصورة</th>
            <th scope="col">الاسم</th>
            <th scope="col">الوصف</th>
        </tr>
    </thead>

    <tbody>
        @foreach($authors as $author)
        <tr>
            <td><img src="{{url('storage/media/'.$author->image)}}" alt="" style="width:100px"></td>
            <td>{{$author->name}}</td>
            <td>{{$author->description}}</td>
        </tr>
        @endforeach
    </tbody>

</table>
<script>
    let table = new DataTable('#myTable', {
        // config options...
    });
</script>
@endsection