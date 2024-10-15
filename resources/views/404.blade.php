@extends('layouts.app')

@php($src = 'https://lexington.local/app/uploads/2024/10/culture.jpeg')
@section('content')
    <x-image :src="$src" />
@endsection
