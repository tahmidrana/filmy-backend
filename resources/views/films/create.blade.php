@extends('layouts.app')

@section('title', 'Create New Movie')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">New Film Entry</div>

                <div class="card-body">
                    <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="release_date">Release Date</label>
                                <input type="date" name="release_date" id="release_date" class="form-control" value="{{ old('release_date') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="ticket_price">Ticket Price</label>
                                <input type="number" name="ticket_price" id="ticket_price" class="form-control" value="{{ old('ticket_price') }}" min="0" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="rating">Rating</label>
                                <input type="number" name="rating" id="rating" class="form-control" value="{{ old('rating') }}" min="0" max="5" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="country">Country</label>
                                <input type="text" name="country" id="country" class="form-control" value="{{ old('country') }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="photo">Photo <small class="text-primary">(Allowed Formats: jpeg, jpg, bmp, png)</small></label>
                                <input type="file" name="photo" id="photo" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="2" class="form-control" required>{{ old('description') }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <select name="genre[]" id="genre" class="form-control" multiple required>
                                @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="submit" name="" id="" class="btn btn-primary" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
