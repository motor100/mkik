<?php

namespace App\Services;

class File
{
    /*
    * Переименование файла
    * Обязательный агрумент $file
    * Illuminate\Http\UploadedFile object
    * Обязательный агрумент $slug
    * Строка
    */
    public function rename_file($slug, $file, $folder = '')
    {
        if ($folder) {
            $folder = $folder . 'files';
        }
        
        $mimetype = $file->getMimeType();
        $filetype = "";
        switch ($mimetype) {
            case "image/jpeg":
                $filetype = ".jpg";
                break;
            case "image/png":
                $filetype = ".png";
                break;
            case "image/gif":
                $filetype = ".gif";
                break;
            case "image/webp":
                $filetype = ".webp";
                break;
            case "application/pdf":
                $filetype = ".pdf";
                break;
            case "application/msword":
                $filetype = ".doc";
                break;
            case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
                $filetype = ".docx";
                break;
            case "application/vnd.ms-excel":
                $filetype = ".xls";
                break;
            case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet":
                $filetype = ".xlsx";
                break;
            case "application/octet-stream":
                if($file->getClientOriginalExtension() == "xlsx") {
                    $filetype = ".xlsx";
                }
                break;
        }

        $new_filename = $slug . '-' . date('dmY') . '-' . mt_rand() . $filetype;
        $tmppathfilename = $file->getPathname();
        $pathname = "storage/uploads/" . $folder . $new_filename;
        $pathnametobase = "storage/uploads/" . $folder . $new_filename;
        move_uploaded_file($tmppathfilename, $pathname);

        return $pathnametobase;
    }
}