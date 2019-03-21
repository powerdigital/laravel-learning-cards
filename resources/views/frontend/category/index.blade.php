@extends('layouts.app')

@section('content')
    @if(count($categories))
        @foreach($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <a href="/card/{{ $category->id }}" class="thumbnail">
                            <img
                                src="{{ asset("storage/images/categories/{$category->name}.jpeg") }}"
                                alt="{{ $category->name }}"
                            />
                        </a>
                    </div>
                    <div class="card-footer">
                        <div class="card-title">
                            <h2>{{ $category->title }}</h2>
                            <h5>[{{ $category->name }}]</h5>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
