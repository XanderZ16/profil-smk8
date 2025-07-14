@props(['title'])

@extends('layouts.app')

@section('title', "SMK Negeri 8 Batam - $title")

@section('content')
    @include('partials.header')

    <div class="flex flex-col items-center px-3 pt-16">
        {{ $slot }}
    </div>

    @include('partials.footer')
@endsection
