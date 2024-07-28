<?php

namespace Components;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
class DocumentManger
{

    public function __construct()
    {
    }
    //  get documents from locat
    public static function getDocumentsFromLocation()
    {
        $directoryPath = './files/past/';
        $aFiles = [];
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directoryPath, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );
        



        // foreach ($iterator as $fileInfo) {
        //     if ($fileInfo->isFile()) {
        //         $filePath = $fileInfo->getPathname();
        //         array_push($aFiles,  $filePath);
        //     }
        // }

        $filesByFolder = [];

                foreach ($iterator as $fileInfo) {
                    if ($fileInfo->isFile()) {
                        $folderPath = $fileInfo->getPath(); // Get the folder path
                        $fileName = $fileInfo->getFilename(); // Get the file name
                        $filePath = $fileInfo->getPathname(); // Full path to the file

                        // Read the file content
                        $content = file_get_contents($filePath);

                        // Organize files by folder
                        if (!isset($filesByFolder[$folderPath])) {
                            $filesByFolder[$folderPath] = [];
                        }
                        $filesByFolder[$folderPath][$fileName] = $content;
                    }
                }
        return $filesByFolder;
    }
    
}
