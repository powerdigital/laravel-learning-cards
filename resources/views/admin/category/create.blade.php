@extends('layouts.admin')

@section('content')
    <div class="form-container">
        {!! Form::open(['route' => 'category.store', 'files' => true]) !!}

        @include('layouts.errors')

        @include('admin.category._form')

        {!! Form::close() !!}
    </div>
@endsection
