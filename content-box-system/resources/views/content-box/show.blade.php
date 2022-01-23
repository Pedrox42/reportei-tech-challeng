@extends('layouts.app')
@section('content')
    @component('components.show')
        @slot('title', $contentBox->title)
        @slot('boxFiles', $contentBox->files)
    @endcomponent
@endsection
