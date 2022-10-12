@extends('layouts.news_template')

@section('body')

    @include('layouts.messages')
        <div class="row">
            @foreach($news as $news)
                <div class="col-sm-6">
                    <div class="card text-center">
                        <div class="card-header">
                            Categories:
                            @foreach($news-> categories as $category)
                        {{$category -> name}}
                        @endforeach 
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$news-> title}}</h5>
                            <a href="{{route('news.show', $news)}}" class="btn btn-primary">Read All</a>
                        </div>
                        <div class="card-footer text-muted">
                        Created: 
                        {{$news-> created_at}}
                        @if ($news-> created_at != $news-> updated_at)
                            </br>
                            Updated: 
                            {{$news-> updated_at}}
                        @endif
                        </div>
                    </div>
                </div>
                </br>
            @endforeach 
        </div> 

@endsection