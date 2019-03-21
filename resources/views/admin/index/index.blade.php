@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <ul>
                        <li><a href="/admin/category">Категории</a></li>
                        <li><a href="/admin/card">Карточки</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
