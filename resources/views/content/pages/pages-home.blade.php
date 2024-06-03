@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
    <h4>Home Page</h4>
    @if (Helper::getProfileById()->rs_nama == 'Super Admin')
        <p>{{ Helper::getProfileById()->rs_nama }}</p>
    @else
        <p>{{ Helper::getProfileById()->rs_nama }}/{{ Helper::getProfileById()->ra_nama }}/{{ Helper::getProfileById()->role_nama }}
        </p>
    @endif

    <p>For more layout options refer <a
            href="{{ config('variables.documentation') ? config('variables.documentation') . '/laravel-introduction.html' : '#' }}"
            target="_blank" rel="noopener noreferrer">documentation</a>.</p>
@endsection
