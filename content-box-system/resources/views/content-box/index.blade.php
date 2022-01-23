@extends('layouts.app');

@section('content')
    @component('components.table')
        @slot('title', 'Content Boxes')
            @slot('create', route('content-box.create'))
            @slot('head')
                <th>Título:</th>
                <th>Criada por: </th>
                <th>Ações: </th>
            @endslot
            @slot('body')
                @foreach($contentBoxes as $contentBox)
                    <td>{{ $contentBox->title }}</td>
                    <td>{{ $contentBox->owner->name }}</td>
                    <td>
                        <a href="{{ route('content-box.show', $contentBox->id) }}"><i class="far fa-eye text-primary"></i></a>
                        <a href="{{ route('content-box.edit', $contentBox->id) }}"><i class="fas fa-edit text-warning mx-3"></i></a>
                        <a href="#" onclick="document.getElementById({{ $contentBox->id }}).submit()"><i class="far fa-trash-alt text-danger"></i></a>
                        <form action="{{ route('content-box.destroy', $contentBox->id) }}" method="post" id="{{ $contentBox->id }}">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                @endforeach
            @endslot
    @endcomponent
@endsection
