@extends('layouts.admin')

@section('content')
    <div class="clearfix">
        <a href="{{ route('card.create') }}" class="btn btn-success pull-right">Добавить</a>
    </div>
    <br/>
    <div class="content">
        @if(count($items))
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Identifier</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Sound</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody class="table-striped">
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $categories[$item['category_id']] }}</td>
                        <td>
                            @if(is_file(public_path("storage/images/cards/{$item['name']}.jpeg")))
                                <div class="image-box">
                                    <img src="{{ asset("storage/images/cards/{$item['name']}.jpeg") }}" />
                                </div>
                            @else
                                <div class="no-image"></div>
                            @endif
                        </td>
                        <td>
                            <div class="sound-box" data-source="{{ asset("storage/sounds/{$item['name']}.wav") }}"></div>
                        </td>
                        <td>
                            <a href="{{ route('card.edit', ['id' => $item['id']]) }}" class="btn btn-info pull-left" style="width: 68px; margin-bottom: 5px;">Edit</a>
                            {{ Form::open(['method' => 'DELETE', 'route' => ['card.destroy', $item['id']]]) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger delete-button']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script type="text/javascript">

    </script>
@endsection
