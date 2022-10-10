@extends('layouts.app')

@section('content')
    <div id="app" >
        @include('layouts.news_navbar')
        @yield('body')
    </div>
@endsection