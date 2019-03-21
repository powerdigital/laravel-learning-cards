<div class="form-group">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id', $categories) !!}
</div>

<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control input-sm']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Identifier') !!}
    {!! Form::text('name', null, ['class' => 'form-control input-sm']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Image') !!}
    {!! Form::file('image', null, ['class' => 'form-control input-sm']) !!}
</div>

<div class="form-group">
    {!! Form::label('sound', 'Sound') !!}
    {!! Form::file('sound', null, ['class' => 'form-control input-sm']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary form-control']) !!}
</div>