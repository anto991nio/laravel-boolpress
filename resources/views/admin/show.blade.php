@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ route('admin.index') }}">Torna alla home</a>

<ul>

    <li>ID: {{ $post->id }}</li>
    <li>TITOLO: {{ $post->title }}</li>
    <li>CONTENUTO: {{ $post->content }}</li>
    <li>CREATO: {{ $post->created_at }}</li>
    <li>MODIFICATO: {{ $post->updated_at }}</li>

    <div class="col row d-flex align-items-center">
        <div>
            <button type="button" class="btn btn-primary"><a class="text-light" href="{{ route('admin.edit', $post->id) }}">Modifica</a></button>
        </div>
       
        <div>
            @include('partials/deleteBtn',["id" => $post->id])
        </div>
    </div>
</ul>
<script src={{asset('js/app.js')}}></script>
</div>
@endsection
