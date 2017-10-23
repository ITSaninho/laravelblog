@extends('layouts.site')

@section('header')
    @include('site_block.header')
@endsection

@section('content')
    @include('site_block.message_list')
    @include('site_block.right_bar')
@endsection

@section('footer')
    @include('site_block.footer')
@endsection