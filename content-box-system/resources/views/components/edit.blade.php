<div class="col-md-10 offset-md-1 col-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <form action="{{ route('content-box.update', $contentBox->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="title">Título:</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $contentBox->title }}" >
                    @error('title')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-body row">
                @foreach($boxFiles as $file)
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('/img/file-default-icon.png') }}">
                            <div class="card-footer">
                                <small class="text-gray">Adicionado em {{ $file->created_at }}</small>
                                <a href="#" onclick="document.getElementById({{ $file->id }}).submit()"><i class="far fa-trash-alt text-danger float-right mt-1"></i></a>
                                <form action="{{ route('file.destroy', $file->id) }}" method="POST" id="{{ $file->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('files') is-invalid @enderror" id="file" name="files[]"  multiple>
                    <label class="custom-file-label" for="file">Escolher arquivo(s)</label>
                    @error('files')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-dark float-left"><a href="{{ route('content-box.index') }}" class="text-light">Voltar</a></button>
                <button type="submit" class="btn btn-primary float-right">Salvar</button>
            </div>
        </form>
    </div>
</div>
