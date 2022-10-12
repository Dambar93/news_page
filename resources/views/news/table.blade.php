@extends('layouts.news_template')

@section('body')

    @include('layouts.messages')
    <table class="table">
        <thead>
            <tr>
            <th scope="col">News Title</th>
            <th scope="col">News contents</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $news)
                <tr>
                    <td>{{$news -> title}}</td>
                    <td>{{$news -> text}}</td>
                    <td>
                        <a href="{{route('news.edit',$news->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                        <form action="{{route('news.destroy',$news->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>   
                    </td>
                </tr>
            @endforeach  
        </tbody>
    </table>    
        
@endsection