@extends('layouts.app')
@section('content')
    @component('components.show')
        @slot('title', $contentBox->title)
        @slot('contentBox', $contentBox)
        @slot('favorited', $favorited)
    @endcomponent
@endsection
