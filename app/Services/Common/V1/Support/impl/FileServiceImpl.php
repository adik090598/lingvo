<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 13.07.2020
 * Time: 16:35
 */

namespace App\Services\Common\V1\Support\impl;


use App\Core\Utils\FileUtil;
use App\Models\Entities\Support\AppFile;
use App\Services\BaseService;
use App\Services\Common\V1\Support\FileService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileServiceImpl extends BaseService implements FileService
{
    public function putFile(UploadedFile $file, $directory = 'files'): AppFile
    {
        $path = $file->store($directory);
        $basename = basename($path);
        $relativePath = "$directory/$basename";
        return AppFile::create([
            'filename' => $basename,
            'relative_path' => $relativePath,
            'cloud_url' => Storage::url($path),
            'system_url' => route('system.files', ['image' => $relativePath]),
        ]);
    }

    public function removeFile(AppFile $appFile)
    {
        Storage::delete($appFile->relative_path);
        $appFile->delete();
    }

    public function getFile($filename)
    {
        return AppFile::where('filename', $filename)->first();
    }

    public function getFileByRelativePath($relative_path)
    {
        if (!Storage::exists($relative_path)) {
            abort(404);
        }
        return Storage::response($relative_path);
    }

    public function store(UploadedFile $image, string $path): string
    {
        $image_path = time() . ((string)Str::uuid()) . 'img.' .$image->getClientOriginalExtension();
        $imageFullPath = $image->move($path, $image_path);
        return $imageFullPath;
    }

    public function remove(string $path)
    {
            if (file_exists($path) && !is_dir($path)) {
                return unlink($path);
        }
        return false;
    }


    public function updateWithRemoveOrStore(UploadedFile $image, string $path, string $oldFilePath = null): string
    {
        if ($oldFilePath) {
            $this->remove($oldFilePath);
        }
        return $this->store($image, $path);
    }
}
