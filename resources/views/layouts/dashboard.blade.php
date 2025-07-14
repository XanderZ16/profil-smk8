@props(['title'])

@extends('layouts.app')

@section('title', "SMK Negeri 8 Batam - $title")

@section('content')
    <style>
        @keyframes waveAnimation {
            0% {
                background-position: 0 0;
            }

            50% {
                background-position: 100% 100%;
            }

            100% {
                background-position: 0 0;
            }
        }

        .gradient-wave {
            background: linear-gradient(45deg, #8377D1, #6ee7b7, #3b82f6, #9333ea);
            background-size: 400% 400%;
            animation: waveAnimation 7s ease infinite;
        }
    </style>

    <div class="relative flex flex-col bg-neutral/80 backdrop:blur-md lg:flex-row">
        @include('partials.admin-nav')

        {{-- Waves Gradient --}}
        <div class="flex items-center justify-center w-screen fixed top-0 left-0 md:h-[20vh] h-[25vh] z-0 gradient-wave"></div>

        <div class="z-10 flex-1 -mt-6 md:mt-0">
            <h1 class="h-[20vh] text-center text-white font-bold text-4xl flex items-center justify-center">
                {{ $title }}
            </h1>
            {{ $slot }}
        </div>
    </div>

    @livewireScripts()
@endsection
