@extends('layouts.master')
<head>
    @include('candidate.layoutsCandidate.head')
</head>
@section('content')
    <header>
        @include('candidate.layoutsCandidate.header')
    </header>
    <form class="container" method="post" action= "{{ route('candidates.update', $id) }}">
        @csrf
        @method('PUT')
        @include('candidate.formCandidate.form_candidate')
    </form>
@endsection
