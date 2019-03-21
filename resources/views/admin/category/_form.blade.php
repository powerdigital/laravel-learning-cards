<div class="form-group">
    {!! Form::label('title', 'Название') !!}
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
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary form-control']) !!}
</div>