@extends('admin')
@section('content')
{{ Auth::user()->email }}
@endsection