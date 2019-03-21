@extends('layouts.admin')

@section('content')
    <div class="form-container">
        {!! Form::model($category, ['route' => ['category.update', $category], 'method' => 'put', 'files' => true]) !!}

        @include('layouts.errors')

        @include('admin.category._form')

        {!! Form::close() !!}
    </div>
@endsection
