@extends('layouts.news_template')

@section('body')

    @include('layouts.messages')    
    <div class="card text-center">
        <div class="card-header">
            Categories:
            @foreach($news -> categories as $category)
            {{$category -> name}}
            @endforeach 
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$news -> title}}</h5>
            <p class="card-text">{{$news -> text}}</p>
        </div>
    </div>
    <div>
        <h4>Comments:</h4>
        @if (count($news -> comments) === 0)
            <h5>No comments yet</h5>
        @endif
        @foreach ($news -> comments as $comment)
            <div class="card">
                <h5 class="card-header">{{$comment -> email}}</h5>
                <div class="card-body">
                    <p class="card-text">{{$comment -> comment}}</p>
                </div>
            </div> </br>
        @endforeach
    </div>
    <div>
        <h4>Create new comment:</h4>
        <form action="{{ route('comment.create',$news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="row">
                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input required type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail4" name="email" placeholder="example@gmail.com">
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Comment:</label>
                    <textarea required class="form-control @error('comment') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="comment" value="{{ old('comment') }}"  placeholder="Comment"></textarea>
                    @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10 text-center">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
    
        </form>
    </div>
@endsection