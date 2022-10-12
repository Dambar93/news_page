@extends('layouts.news_template')

@section('body')
    <form action="{{ route('news.edit',$news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input required type="text" name="title" value="{{$news -> title}}" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Text:</strong>
                    <input required type="text" name="text" value="{{$news -> text}}" class="form-control @error('text') is-invalid @enderror" placeholder="News text">
                    @error('text')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Category:</strong>
                    <select class="form-select" name="category[]"  multiple>  

           
                        @foreach($categories as $category)
                                @if (isset($activeCategories[$category -> id]))
                                    {
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    }
                                @else
                                    {
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    }
                                    
                                    
                                @endif
                        @endforeach
                    </select>
                    
                    @error('category')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                   
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>

    </form>
@endsection