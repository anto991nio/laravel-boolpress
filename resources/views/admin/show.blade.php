@extends('layouts.app')

@section('content')
<div class="container">

    <div class="text-right">

        <button type="button" class="btn btn-primary"><a href="{{ route('admin.index') }}" class="text-light">Torna alla home</a></button>

    </div>
    <div class="container post-container">

        <div class="border row">
            <div class="col">
                <h4 class="text-secondary">ID: {{ $post->id }}</h4>

                <div class="text-left">
                    <h5 class="text-primary">TITOLO: {{ $post->title }}</h5>
                    <h5 class="text-secondary">CONTENUTO: {{ $post->content }}</h5>
                    <h5 class="text-secondary">CREATO: {{ $post->created_at }}</h5>
                    <h5 class="text-secondary">MODIFICATO: {{ $post->updated_at }}</h5>
                    <h5 class="text-secondary">UTENTE: {{ $user->name }}</h5>
                    <div>
                            <img src="{{ $post->image_url ? asset('storage/' . $post->image_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png'}}" alt="">
                            </div>
                    <p class="text-left"> CATEGORIA:{{ $post->category ? $post->category->name : 'none' }}</p>
                    TAG:
                    @foreach($post->tags as $tag)
                    <p class="badge badge-primary ">{{ $tag->name }}</p>
                    @endforeach
                </div>




            </div>



        </div>
        @auth
        <div class="btn-row row d-flex justify-content-around align-items-center">
            @if ((Auth::user()->id)==$post->user->id)
            <div>
                <button type="button" class="btn btn-secondary"><a class="text-light" href="{{ route('admin.edit', $post->id) }}"><i class="fa fa-pencil-square text-secondary" aria-hidden="true"> Modifica</i></a></button>
            </div>
            <div>
                @include('partials/deleteBtn',["id" => $post->id])
            </div>

            @endif


        </div>
        @endauth
    </div>


</div>
@endsection
