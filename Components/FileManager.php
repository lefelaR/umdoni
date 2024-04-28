<?php

namespace Components;

class FileUploader {
    private $uploadDirectory;

    public function __construct($uploadDirectory) {
        $this->uploadDirectory = $uploadDirectory;
    }

    public function uploadFile($fileInputName) {
        if (!isset($_FILES[$fileInputName])) {
            return "No file uploaded.";
        }

        $file = $_FILES[$fileInputName];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];

        // Check if the upload directory exists
        if (!file_exists($this->uploadDirectory)) {
            mkdir($this->uploadDirectory, 0777, true);
        }

        // Move the uploaded file to the destination directory
        $destination = $this->uploadDirectory . '/' . $fileName;
        if (move_uploaded_file($fileTmpName, $destination)) {
            return "File uploaded successfully to $destination.";
        } else {
            return "Error uploading file.";
        }
    }
}

// Example usage:
$uploader = new FileUploader('/path/to/upload/directory');
echo $uploader->uploadFile('file_input_name'); // Replace 'file_input_name' with the name attribute of your file input field