@extends('layouts.app')
@section('title','Posts Page')
@section('content')

  @if(count($posts))
    @foreach($posts as $post)
      <div>{{$post['title']}}</div>    
    @endforeach
  @endif


  @forelse($posts as $post)
    @include('posts.partials.post',[])
  @empty
    <div>Not Post available</div>
  @endforelse

@endsection




