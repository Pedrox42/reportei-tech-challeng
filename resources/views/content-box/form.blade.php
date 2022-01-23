<div class="form-group">
    <label for="title">Título:</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" >
    @error('title')
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<label class="mt-3">Arquivo(s) da Box:</label>
<div class="custom-file">
    <input type="file" class="custom-file-input @error('files') is-invalid @enderror" id="file" name="files[]"  multiple>
    <label class="custom-file-label" for="file">Escolher arquivo(s)</label>
    @error('files')
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
