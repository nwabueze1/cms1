@extends('layouts.app')

@section('content')

    {{html()->form('POST')->route('posts.store')->class('grid')->open()}}
    {{html()->text('title')->placeholder('Enter title')}}
    {{html()->textarea('body')->placeholder('Enter post content')}}
    {{html()->submit('create post')}}
    {{html()->form()->close()}}
@endsection


@yield('footer')
