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


        $directoryPath = './files/';
        $aFiles = [];
        $route = '';
       


        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directoryPath, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );
        
        foreach ($iterator as $fileInfo) {
            if ($fileInfo->isFile()) {
                $filePath = $fileInfo->getPathname();
                array_push($aFiles,  $filePath);
            }
        }

        return $aFiles;
    }
    
}
