<?php

namespace Components;

class DocumentManger
{

    public function __construct()
    {
    }
    //  get documents from locat
    public static function getDocumentsFromLocation()
    {


        $directoryPath = './files/documents/';
        $aFiles = [];
        try {
            // Open the directory
            if (is_dir($directoryPath)) {
                $dh = openDir($directoryPath);
                if ($dh != null) {
                    // Loop through the directory
                    while (($file = readdir($dh)) !== false) {
                        // Skip the current and parent directory links
                        if ($file != "." && $file != "..") {
                            // Display the file name

                            array_push($aFiles, $file);
                  
                    }
                    // Close the directory
                    closedir($dh);
                } else {
                    echo "Unable to open directory.";
                }
            } else {
                throw new Exception("Error Processing Request", 1);
            }
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
        }
    
    }


    public function openDir($directoryPath)
    {
      return  $dh = opendir($directoryPath);
    }
}
