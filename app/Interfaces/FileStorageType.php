<?php

namespace App\Interfaces;

interface FileStorageType {
    public function storeFile($file,$folderPath);
    public function retriveFile($fileUrl);
}