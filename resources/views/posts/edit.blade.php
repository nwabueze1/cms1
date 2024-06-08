@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-3">Edit Post</h1>

    {{html()->modelForm($post,'PUT', '/posts/update')->class('grid gap-2')->open()}}
    {{html()->text('title')->class("outline-0 border-gray-500 border-[1px] p-2 rounded-md")}}
    @error('title')
    <span class="alert-danger text-red-700" >{{$message}}</span>
    @enderror
    {{html()->textarea('body')->class("outline-0 border-gray-500 border-[1px] p-2 rounded-md")}}
    @error('body')
    <span class="alert-danger text-red-700" >{{$message}}</span>
    @enderror
    {{html()->submit('update')->class("inline-block bg-gray-800 text-white rounded-md py-2 px-4 hover:bg-gray-600")}}
    {{html()->closeModelForm()}}
@endsection


@yield('footer')
