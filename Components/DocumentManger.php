<?php

namespace Components;

global $context;

class DocumentManager{


//  get documents from locat
public function getDocumentsFromLocation(){


$directoryPath = url('files/documents');

// Open the directory
if (is_dir($directoryPath)) {
    if ($dh = opendir($directoryPath)) {
        // Loop through the directory
        while (($file = readdir($dh)) !== false) {
            // Skip the current and parent directory links
            if ($file != "." && $file != "..") {
                // Display the file name
                echo "File: $file<br>";
            }
        }
        // Close the directory
        closedir($dh);
    } else {
        echo "Unable to open directory.";
    }
} else {
    echo "The specified path is not a directory.";
}

}

}


?>