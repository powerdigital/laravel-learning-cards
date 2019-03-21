@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Категории</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $category }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mt-2">
        <div class="row">
            @if(count($items))
                @foreach($items as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 sound" data-source="{{ asset("storage/sounds/{$item['name']}.wav") }}">
                            <div class="card-body text-center">
                                <div href="/category/{{ $item->name }}" class="thumbnail">
                                    <img
                                        src="{{ asset("storage/images/cards/{$item->name}.jpeg") }}"
                                        alt="{{ $item->title }}"
                                    />
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="card-sound"></div>
                                <div class="card-title">
                                    <h2>{{ $item->title }}</h2>
                                    <h5>[{{ $item->name }}]</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
