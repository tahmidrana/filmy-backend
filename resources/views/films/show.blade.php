@extends('layouts.app')

@section('title', $film->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>{{ $film->name }}</strong></h5>
                    <p class="card-text">{{ $film->description }}</p>
                    <p><strong>Release Date: </strong> {{ \Carbon\Carbon::parse($film->release_date)->format('d M, Y') }} <br>
                    <strong>Rating: </strong> {{ $film->rating }} out of 5 <br>
                    <strong>Ticket Price: </strong> {{ $film->ticket_price }} <br>
                    <strong>Country: </strong> {{ $film->country }}</p>
                    @if($film->genres->count())
                    <p class="text-muted">
                        @foreach($film->genres as $genre)
                        #{{ $genre->title }}
                        @endforeach
                    </p>
                    @endif
                </div>
            </div>
            
            
            <div class="py-4">
                <h4>Comments</h4>
                <div class="card">
                    <div class="card-header">
                        @guest
                            <span class="text-danger">Please login to comment</span>
                        @else
                        <form action="{{ route('comments.store', ['film_id'=> $film->id]) }}" method="POST">
                            @csrf
                            <textarea name="comment_body" class="form-control" rows="2" placeholder="Write your comment" required></textarea>
                            <input type="submit" class="btn btn-primary btn-sm float-right mt-2" value="Comment">
                        </form>
                        @endguest
                    </div>
                    @if($film->comments->count())
                    <div class="card-body">
                        @foreach ($film->comments as $comment)
                            <div class="my-2">
                                <span class="text-muted">{{ $comment->user->name }}</span>
                                <p class="card-text">{{ $comment->comment_body }}</p>
                                <hr>
                            </div>  
                        @endforeach                                  
                    </div>
                    @endif
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <h3>Feature Image</h3>
            <img src="{{ $film->photo }}" alt="" style="width: 100%"/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
</div>
@endsection
