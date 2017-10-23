@extends('layouts.admin')

@section('header')
    @include('admin_block.header')
@endsection

@section('content')
    @include('admin_block.messages_show')
    @include('admin_block.right_bar')
@endsection

@section('footer')
    @include('admin_block.footer')
@endsection