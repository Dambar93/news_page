@extends('layouts.news_template')

@section('body')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @foreach($news as $news)
        <div class="card text-center">
            <div class="card-header">
                Kategorijos:
                @foreach($news-> categories as $category)
               {{$category -> name}}
               @endforeach 
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$news-> title}}</h5>
                <p class="card-text">{{$news-> text}}</p>
                <a href="#" class="btn btn-primary">Read All</a>
            </div>
            <div class="card-footer text-muted">
               Sukurta: 
               {{$news-> created_at}}
            </div>
        </div>
    @endforeach  
@endsection
