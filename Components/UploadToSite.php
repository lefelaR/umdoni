<?php

namespace Components;


use Exception;

class UploadToSite
{

    static function upload($aFile): string
    {

        global $context;

        $sFolder = getFolder();
        $sYear = getYear();
        $sMonth = getMonth();

        if (isset($aFile)) {
            $location = './files/' . $sFolder . '/' . $sYear . '/' . $sMonth . '/';
            if (count($aFile) > 0) {
                $filePath = $aFile['name']['tmp_name'];
                $objectKey = $aFile['name']['name'];
                $sLocation = $location . $objectKey;
                // if tthat folder exists yet
                if (!is_dir($location)) {
                    if (!mkdir($location)) {
                        echo ("Error creating the directory.");
                    }
                }
                try {
                   move_uploaded_file($filePath, $sLocation);
                             
                } catch (Exception $th) {
                    throw new Exception($th->getMessage());
                }
            }else{
                echo "the file upload was unsuccessful";
            }
        }
        return $sLocation;  
    }
}



function getFolder()
{
    $url = explode('/', $_SERVER['REQUEST_URI']);
    foreach ($url as $key => $value) {
        if ($value == 'dashboard') {
            $folder = $url[$key + 1];
        }
    }
    return $folder;
}


function createDir(string $sPath): string
{
    $sPath = str_replace("", "/", $sPath);
}
?>