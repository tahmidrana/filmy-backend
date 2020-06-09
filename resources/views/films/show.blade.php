@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $film->name }}</h5>
                    <p class="card-text">{{ $film->description }}</p>
                    <p><strong>Release Date: </strong> {{ \Carbon\Carbon::parse($film->release_date)->format('d M, Y') }} <br>
                    <strong>Rating: </strong> {{ $film->rating }} out of 5 <br>
                    <strong>Ticket Price: </strong> {{ $film->ticket_price }} <br>
                    <strong>Country: </strong> {{ $film->country }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h3>Feature Image</h3>
            <img src="/uploads/{{ $film->photo }}" alt="" style="width: 100%"/>
        </div>
    </div>
</div>
@endsection
