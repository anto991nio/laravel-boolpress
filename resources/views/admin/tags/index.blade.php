@extends('layouts.app')

@section('content')

@foreach ($tags as $tag)
          <ul>
            <li>{{ $tag->name }}</li>   
          </ul>
          @endforeach
@endsection