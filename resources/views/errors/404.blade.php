@extends('errors::error-layout')

@section('title', __('Not found'))
@section('code', '404')
@section('message', __($exception->getMessage() ?: 'Not found'))
