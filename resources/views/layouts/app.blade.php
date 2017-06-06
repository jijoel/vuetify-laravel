@extends('layouts.master')

@section('body')

    <va-layout
        name="{{ config('app.name', 'Laravel') }}"
    >

        @yield('content')

    </va-layout>

@endSection
