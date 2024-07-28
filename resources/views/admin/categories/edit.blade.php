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

<form action="{{route('dashboard.categories.update',[$category])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card">
        <div class="card-header text-center bg-secondary text-white">
            <h5>Add New category</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">category Name</label>
                <input value="{{$category->name}}" type="text" class="form-control" name="name" id="name">
            </div>
            <div class="row">
                <div class="col-10">
                    <div class="mb-3">
                        <label for="name" class="form-label">category Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div>
                <div class="col-2">
                    current Image
                    <img src="{{url('storage/media/'.$category->image)}}" alt="" style="width:100px">
                </div>
            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-secondary w-50">Send</button>
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