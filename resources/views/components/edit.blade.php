<div class="col-md-10 offset-md-1 col-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="col-sm-12 mb-5">
                <h3 class="card-title title-form">{{ $title ?? null }}</h3>
            </div>
            <form action="{{ route('content-box.update', $contentBox->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="row">
                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $contentBox->title }}" >
                        @error('title')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="custom-file col-sm-6 pt-3">
                        <input type="file" class="custom-file-input @error('files') is-invalid @enderror" id="file" name="files[]"  multiple>
                        <label class="custom-file-label" for="file">Escolher arquivo(s)</label>
                        @error('files')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Salvar</button>
        </div>
            </form>
        <div class="card-body row">
            @foreach($boxFiles as $file)
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        @if(explode('.', $file->name)[1] == 'png' || explode('.', $file->name)[1] == 'gif' || explode('.', $file->name)[1] == 'jpg' || explode('.', $file->name)[1] == 'jpeg' || explode('.', $file->name)[1] == 'svg')
                            <img class="card-img-top" src="{{ asset('/storage/cb-files/'.$file->name) }}" width="200" height="200">
                        @elseif(explode('.', $file->name)[1] == 'pdf')
                            <img class="card-img-top" src="{{ asset('/img/defaults/pdf-default-image.png') }}" width="200" height="200">
                        @elseif(explode('.', $file->name)[1] == 'zip' || explode('.', $file->name)[1] == 'tar' || explode('.', $file->name)[1] == 'gzip' || explode('.', $file->name)[1] == '7z')
                            <img class="card-img-top" src="{{ asset('/img/defaults/compressed-default-image.png') }}" width="200" height="200">
                        @endif
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
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-dark float-left"><a href="{{ route('content-box.index') }}" class="text-light">Voltar</a></button>
        </div>
    </div>
</div>
