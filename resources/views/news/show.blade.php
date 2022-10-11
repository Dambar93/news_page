@extends('layouts.news_template')

@section('body')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card text-center">
        <div class="card-header">
            Kategorijos:
            @foreach($news -> categories as $category)
            {{$category -> name}}
            @endforeach 
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$news -> title}}</h5>
            <p class="card-text">{{$news -> text}}</p>
        </div>
        <div class="card-footer text-muted">
            Sukurta: 
            {{$news -> created_at}}
        </div>
    </div>
    <div>
        <h4>Comments:</h4>
        @foreach ($news -> comments as $comment)
            <div class="card">
                <h5 class="card-header">{{$comment -> email}}</h5>
                <div class="card-body">
                    <p class="card-text">{{$comment -> comment}}</p>
                </div>
            </div> 
        @endforeach

    </div>
@endsection