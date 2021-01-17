@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Star Profile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('stars.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>

    <div class="row text-center mt-4">

        <div class="col-sm d-flex justify-content-center">
            <div class="card" style="width: 36rem;">
                @if(strpos($star->image, 'public') !== false)
                    <img class="card-img-top" src="{{ asset('../storage/app/'.$star->image) }}" alt="{{ $star->name.' '.$star->firstname }}" />
                @else
                    <img class="card-img-top" src="{{ url($star->image) }}" alt="{{ $star->name.' '.$star->firstname }}" />
                @endif
                <div class="card-body">
                  <h5 class="card-title">{{ $star->name.' '.$star->firstname }}</h5>
                  <p class="card-text">{{ $star->description }}</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
