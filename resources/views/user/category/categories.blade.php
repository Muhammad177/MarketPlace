@extends('user.index.navbar')
@section('container')
  <h1>Categorys : {{ $title }}<h1>
      @foreach ($categories as $category)
        <h2><a href="/post?category={{ $category->slug }}"> {{ $category->slug }}</a></h2>
      @endforeach
    @endsection
