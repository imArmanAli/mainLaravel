<?php


namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class FileService
{
	/**
	 * Uplaod Sinle File
	 */


	public function saveFile($file,  $dirPath)
	{
		$newFilename = time() . '.' . $file->getClientOriginalExtension();

		$storedFilename = Auth::id() . '_' . $newFilename;
		$des = "{$dirPath}/{$storedFilename}";
		Storage::disk('public')->put($des, File::get($file));
        return $des;

	}

	public function saveFileWithName($file,  $dirPath,  $imgName)
	{

		$storedFilename =  $imgName;

		$des = "{$dirPath}/{$storedFilename}";
		Storage::disk('public')->put($des, File::get($file));
		return $storedFilename;
	}

	public function saveServiceFileWithIdName($file,  $dirPath,  $newId, $imgName, $serviceTypeImg)
	{

		$storedFilename = $newId . $serviceTypeImg . $imgName;

		$des = "{$dirPath}/{$storedFilename}";
		Storage::disk('public')->put($des, File::get($file));

		return $storedFilename;
	}



	public function url($file,  $dir = "")
	{
		return Storage::url("{$dir}/{$file}");
	}

	public function path($file)
	{
		return Storage::disk('public')->url("{$file}");
	}

	public function defaultPath($file,  $dir = "")
	{
		return Storage::disk('public')->url("{$dir}/{$file}");
	}
	/**
	 * Uplaod Sinle File
	 */
	public function multiple()
	{
	}
}
