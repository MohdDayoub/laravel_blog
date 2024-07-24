@extends('admin.layout')

@section('main')

    <a class="btn btn-secondary" href="{{ url('/dashboard/authors/create') }}">اضافة كاتب</a>

    <table id="myTable" class="display">
        <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 3 Data 4</td>
            <td>Row 3 Data 4</td>
        </tr>
        </tbody>
    </table>

    <script>

        let table = new DataTable('#myTable', {
            // config options...
        });
    </script>

@endsection

