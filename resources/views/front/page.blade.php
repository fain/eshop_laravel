@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('right_sidebar')
	@

    <p>This is appended to the master right sidebar.</p>
@endsection

@section('content')
<h2>{{$name}}</h2>   
<p>This is my body content.</p>
@endsection