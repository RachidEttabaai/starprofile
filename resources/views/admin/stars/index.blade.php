@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Dashboard Profile Browser</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('stars.create') }}"> Create New Star Profile</a>
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
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Firstname</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($stars as $star)
            <tr>
                <td>{{ $star->id }}</td>
                <td>
                    @if(strpos($star->image, 'public') !== false)
                        <img src="{{ asset('../storage/app/'.$star->image) }}" height="100" width="100" alt="" />
                    @else
                        <img src="{{ url($star->image) }}" height="100" width="100" alt="" />
                    @endif
                </td>
                <td>{{ $star->name }}</td>
                <td>{{ $star->firstname }}</td>
                <td>{{ $star->description }}</td>
                <td>
                    <form action="{{ route('stars.destroy',$star->id) }}" method="star">

                        <a class="btn btn-primary" href="{{ route('stars.show',$star->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('stars.edit',$star->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this star profile {{ $star->id }} ?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</div>
@endsection
