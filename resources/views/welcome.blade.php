@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Profile Browser</h2>
            </div>
        </div>
    </div>

    @foreach($stars as $star)
    <div class="row text-center">

        <div class="col-sm">
            <a href="#{{ $star->name }}" data-toggle="collapse">
                {{ $star->name }} {{ $star->firstname }}
            </a>
        </div>

        <div class="col-sm d-flex justify-content-center">
            <div id="{{ $star->name }}" class="card collapse" style="width: 18rem;">
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
    @endforeach


</div>
@endsection
