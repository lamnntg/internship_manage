@extends('layouts.master')
<head>
    @include('candidate.layoutsCandidate.head')
</head>
@section('content')
    <header>
        @include('candidate.layoutsCandidate.header')
    </header>
    <form class="container" method="post" action="{{ route('candidates.store') }}">
        @csrf
        @include('candidate.formCandidate.form_candidate')
    </form>
@endsection
