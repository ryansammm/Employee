<?php

namespace App\Media\Model;

use Core\Classes\SessionData;
use Core\Model;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Media extends Model
{
    protected $table = 'media';
    protected $primaryKey = 'id_media';

    public $path = '';
    protected $originalName = false;

    public function path(string $path = '')
    {
        if ($path == 'fonts') {
            $this->path = fonts_path();
        } else {
            $this->path = storage_path();
        }

        return $this;
    }

    public function useOriginalName()
    {
        $this->originalName = true;

        return $this;
    }

    // /**
    //  * Function upload file
    //  * 
    //  * @param array $file
    //  */
    // public function uploadFileCustom(array $file)
    // {
    //     $fileUpload = $file;
    //     $target_file_name = null;
    //     if (!is_null($fileUpload)) {
    //         $source_path  = $fileUpload['tmp_name'];
    //         $file_name = $fileUpload['name'];
    //         $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
    //         $target_file_name = time() . "-" . uniqid() . "." . $file_extension;
    //         $target_directory = "../web/assets/media/" . $target_file_name;
    //         $uploads = [];

    //         move_uploaded_file($source_path, $target_directory);
    //         $uploads['status'] = true;
    //         $uploads['file'] = $target_file_name;
    //     }

    //     return $uploads;
    // }

    /**
     * Function upload file
     * 
     * @param UploadedFile $file
     */
    public function uploadFile(UploadedFile $file)
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = str_slug($originalFilename);
        if (!$this->originalName) {
            $newFilename = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();
        } else {
            $newFilename = $file->getClientOriginalName();
        }

        if ($this->path == '') {
            $this->path();
        }

        try {
            $file->move(
                $this->path,
                $newFilename
            );

            $data = [
                'status' => true,
                'file' => $newFilename,
                'message' => 'File uploaded successfully'
            ];
            $this->originalName = false;
        } catch (FileException $e) {
            $data = [
                'status' => false,
                'file' => null,
                'message' => 'Error uploading file: ' . $e->getMessage()
            ];
        }




        return $data;
    }

    // /**
    //  * Function store media
    //  * 
    //  * @param array $file
    //  * @param array $data_media example: ['id_relation' => '', 'jenis_dokumen' => '']
    //  * 
    //  */
    // public function storeMedia(array $file, array $data_media)
    // {
    //     if (isset($file) && $file['name'] != '') {
    //         $dokumen = $this->uploadFileCustom($file);
    //         $data_media = [
    //             'path_media' => $dokumen['file'],
    //             'id_relation' => $data_media['id_relation'],
    //             'id_entity' => SessionData::get('id_user') != null ?? '',
    //             'jenis_dokumen' => $data_media['jenis_dokumen'],
    //         ];
    //         $this->insert($data_media);
    //     }

    //     return $dokumen;
    // }

    /**
     * Function store media
     * 
     * @param UploadedFile|null $file
     * @param array $data_media example: ['id_relation' => '', 'jenis_dokumen' => '']
     * 
     */
    public function storeMedia($file, array $data_media)
    {
        if ($file != null) {
            $dokumen = $this->uploadFile($file);
            $data_media = [
                'path_media' => $dokumen['file'],
                'id_relation' => $data_media['id_relation'],
                'id_entity' => SessionData::get('id_user') ?? '',
                'jenis_dokumen' => $data_media['jenis_dokumen'],
            ];
            $this->insert($data_media);
        }


        return $dokumen;
    }

    /**
     * Function update media
     * 
     * @param UploadedFile|null $file
     * @param array $data_media example: ['id_relation' => '', 'jenis_dokumen' => '']
     * 
     */
    public function updateMedia($file, array $data_media, Model $model, string $id_tabel)
    {
        if ($file != null) {
            $media_data = $model->select('media.*')
                ->leftJoin('media', 'media.id_relation', '=', $model->table . '.' . $model->primaryKey)
                ->where(function ($query) use ($data_media) {
                    if ($data_media['jenis_dokumen'] != '') {
                        $query->where('media.jenis_dokumen', $data_media['jenis_dokumen']);
                    }
                })
                ->where($model->primaryKey, $id_tabel)->first();
            // dd($media_data);
            $this->deleteMedia($media_data);
            $dokumen = $this->storeMedia($file, $data_media);

            return $dokumen;
        }
    }

    /**
     * Function delete media
     * 
     * @param string $file
     * 
     */
    public function deleteFile(string $file)
    {
        if (file_exists(__DIR__ . '/../../../../web/assets/media/' . $file)) {
            unlink(__DIR__ . '/../../../../web/assets/media/' . $file);

            return true;
        }

        return false;
    }

    /**
     * Function delete media
     * 
     */
    public function deleteMedia($data_media)
    {

        if (is_array($data_media) && $data_media['path_media'] != null) {
            $this->deleteFile($data_media['path_media']);
            $this->where('id_media', $data_media['id_media'])->delete();
        }

        return true;
    }



    public function compressed(UploadedFile $args)
    {

        // BELUM BEREEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEES

        /* -------------------------------- Compress -------------------------------- */
        // Compress Image
        if (isset($_POST['upload'])) {

            // Getting file name
            $filename = $_FILES['imagefile']['name'];

            // Valid extension
            $valid_ext = array('png', 'jpeg', 'jpg');

            // Location
            $location = "images/" . $filename;

            // file extension
            $file_extension = pathinfo($location, PATHINFO_EXTENSION);
            $file_extension = strtolower($file_extension);

            // Check extension
            if (in_array($file_extension, $valid_ext)) {

                // Compress Image
                compressImage($_FILES['imagefile']['tmp_name'], $location, 60);
            } else {
                echo "Invalid file type.";
            }
        }

        // Compress image
        function compressImage($source, $destination, $quality)
        {

            $info = getimagesize($source);

            if ($info['mime'] == 'image/jpeg')
                $image = imagecreatefromjpeg($source);

            elseif ($info['mime'] == 'image/gif')
                $image = imagecreatefromgif($source);

            elseif ($info['mime'] == 'image/png')
                $image = imagecreatefrompng($source);

            imagejpeg($image, $destination, $quality);
        }
        /* -------------------------------------------------------------------------- */
    }
}
