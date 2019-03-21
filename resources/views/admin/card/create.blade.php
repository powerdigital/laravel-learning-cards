@extends('layouts.admin')

@section('content')
    <div class="form-container">
        {!! Form::open(['route' => 'card.store', 'files' => true]) !!}

            @include('layouts.errors')

            @include('admin.card._form', ['categories' => $categories])

        {!! Form::close() !!}
    </div>
@endsection
