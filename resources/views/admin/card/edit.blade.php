@extends('layouts.admin')

@section('content')
    <div class="form-container">
        {!! Form::model($card, ['route' => ['card.update', $card], 'method' => 'put', 'files' => true]) !!}

            @include('layouts.errors')

        @include('admin.card._form', ['categories' => $categories])

        {!! Form::close() !!}
    </div>
@endsection
