<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\File;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function destroy(File $file)
    {;
        $directory = Config::get('uploaded-files.directory');
        Storage::delete($directory . '/' . $file->name);
        $file->delete();
        return redirect(route('content-box.edit', $file->contentBox->id));
    }
}
