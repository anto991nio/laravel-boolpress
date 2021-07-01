@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="post ">
                        @guest
                        <h4 class="text-secondary">Per poter interagire con i post è necessario loggarti</h4>
                        @endguest
                        @auth
                        <a href="{{route("admin.create")}}">Crea un post</a>
                        @endauth
                        @foreach($posts as $post)
                        <div class="container">

                            <div class="border row">
                                <div class="col">
                                    <h1 class="text-primary">Titolo : {{$post->title}}</h1>
                                    <h3 class="text-secondary">Contenuto : {{$post->content}}</h3>
                                </div>


                                @auth
                                <div class="col row d-flex justify-content-around align-items-center">
                                    <div >
                                    <button type="button" class="btn btn-primary"><a class="text-light" href="{{ route('admin.edit', $post->id) }}">Modifica</a></button>
                                    </div>
                                    <div >
                                    <button type="button" class="btn btn-secondary"><a class="text-light" href="{{ route('admin.show', $post->id) }}">Dettagli</a></button>
                                    </div>
                                    <div >
                                    @include('partials/deleteBtn',["id" => $post->id])
                                    </div>
                                </div>
                                @endauth
                            </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
