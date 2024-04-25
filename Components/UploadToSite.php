<?php

namespace Components;

class UploadToSite
{

    static function upload($afile, $sType): string
    {
        $sLocation = array();
        // upload to local folder
        if (isset($_FILES)) {
            $file = $_FILES;
            $location = './files/' . $sType ;
            if (count($file) > 0) {

                    $filePath = $file['name']['tmp_name'];
                    $objectKey = $file['name']['name'];
                    $sLocation = $location . $objectKey;

                    if (move_uploaded_file($filePath, $sLocation)) {
                        echo "PDF file uploaded successfully. File path: $sLocation";
                    } else {
                        echo "Failed to upload PDF file.";
                    } 
            }
        }
        return $sLocation;
    }

}



function createDir(string $sPath): string
{
    $sPath = str_replace("", "/", $sPath);

}

?>