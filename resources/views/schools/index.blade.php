@extends('schools.layouts')

@section('content')
    <div class="row">
        <div class="mt-10 ">
            <div class="pull-left">
                <h2>School Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('school.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Mobile no.</th>
            <th>City</th>
            <th>State</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($schools as $school)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/image/{{ $school->image }}" width="100px"></td>
            <td>{{ $school->name }}</td>
            <td>{{ $school->email }}</td>
            <td>{{ $school->address }}</td>
            <td>{{ $school->contact_no }}</td>
            <td>{{ $school->city }}</td>
            <td>{{ $school->state }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('school.edit',$school->id) }}">Edit</a>
                <a href="{{ route('school.delete',$school->id) }}" class="btn btn-danger">Delete</a>


            </td>
        </tr>
         @endforeach
        </table>

        {!! $schools->links() !!}

@endsection
