@extends('admin.layout')

@section('main')
    <a class="btn btn-secondary" href="{{ url('/dashboard/authors/create') }}">اضافة كاتب</a>

    <div class="card">
        <div class="card-body">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>الاسم</th>
                        <th>الوصف</th>
                        <th>Actions</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($authors as $author)
                        <tr>
                            <td><img src="{{ url('/storage/media/' . $author->image) }}" style="width: 150px"></td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->description }}</td>
                            <td>



                                {{-- <a href="{{ url('') }}" class="btn btn-danger mx-2">
                                    <i class="fa-solid fa-trash mx-2"></i>
                                </a> --}}

                                <form action="{{ route('dashboard.authors.destroy', [$author]) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <a href="{{ url('dashboard/authors/' . $author->id . '/edit') }}"
                                        class="btn btn-primary mx-2">
                                        <i class="fa-solid fa-edit mx-2"></i>
                                    </a>

                                    <button type="submit" class="btn btn-danger mx-2"><i class="fa-solid fa-trash mx-2"></i>
                                    </button>
                                </form>



                            </td>
                        </tr>
                    @endforeach

                </tbody>

        </div>
    </div>



    <script>
        let table = new DataTable('#myTable', {
            // config options
        });
    </script>
@endsection

{{-- @foreach ($authors as $author)
<tr>
    <td><img src="{{url('/storage/media/'.$author->image)}}" style="width: 200px"></td>
    <td>{{$author->name}}</td>
    <td>{{$author->description}}</td>
</tr>
@endforeach
</table> --}}
