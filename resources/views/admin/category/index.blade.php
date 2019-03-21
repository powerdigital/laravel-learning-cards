@extends('layouts.admin')

@section('content')
    <div class="clearfix">
        <a href="{{ route('category.create') }}" class="btn btn-success pull-right">Добавить</a>
    </div>
    <br/>
    <div class="content">
        @if(count($items))
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Identifier</th>
                    <th width="100px">Image</th>
                    <th width="100px">Manage</th>
                </tr>
                </thead>
                <tbody class="table-striped">
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>
                            @if(is_file(public_path("storage/images/categories/{$item['name']}.jpeg")))
                                <div class="image-box">
                                    <img src="{{ asset("storage/images/categories/{$item['name']}.jpeg") }}" />
                                </div>
                            @else
                                <div class="no-image"></div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('category.edit', ['id' => $item['id']]) }}" class="btn btn-info pull-left" style="width: 68px; margin-bottom: 5px;">Edit</a>
                            {{ Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $item['id']]]) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
