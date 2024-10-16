<?php

namespace Components;

class UploadToSite
{

    static function upload($aFile): string
    {

        global $context;

        $sFolder = getFolder();
        $sYear = getYear();
        $sMonth = getMonth();

        if (isset($aFile)) {
            $location = '/files/' . $sFolder . '/' . $sYear . '/' . $sMonth . '/';

            if (count($aFile) > 0) {
                $filePath = $aFile['name']['tmp_name'];
                $objectKey = $aFile['name']['name'];
                $sLocation = $location . $objectKey;

                // if tthat folder exists yet
                if (!is_dir($location)) {
                    if (!mkdir($location, 0777, true) && !is_dir($location)) {
                        throw new \RuntimeException(sprintf('Directory "%s" was not created', $location));
                    }
                }
                if (move_uploaded_file($filePath, $sLocation)) {
                    return $sLocation;
                } else {
                    return false;
                }

            }
        }

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


function createDir($sPath =""): string
{
    $sPath = str_replace("", "/", $sPath);
    return $sPath;
}



?>