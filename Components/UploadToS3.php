<?php

namespace Components;

use Aws\S3\S3Client;
use Intervention\Image\ImageManagerStatic as Image;



class UploadToS3
{
    private $bucketName;
    private $awsAccessKeyId;
    private $clientId;
    private $userPoolId;
    private $region;
    private $awsSecretAccessKey;


    
    public function __construct()
    {
        $this->awsAccessKeyId  = $_ENV['AWS_ACCESS_KEY_ID'];
        $this->clientId = $_ENV['AWS_COGNITO_CLIENT_ID'];
        $this->userPoolId = $_ENV['AWS_COGNITO_USER_POOL_ID'];
        $this->region = $_ENV['AWS_REGION'];
        $this->awsSecretAccessKey  =  $_ENV['AWS_SECRET_ACCESS_KEY'];
        $this->bucketName = $_ENV['BUCKET_NAME'];
    }


    $bucketName = 'umdoni-document-bucket';
    $awsAccessKeyId = 'AKIA3FVMIL3UXGIEI3WH';
    $awsSecretAccessKey = '/yXhJ3sHfpl0Ykp/ZCv59VdHAXxiXoc2gAAP3XZa';
    $region = 'eu-central-1'; // Change to your desired region

    $s3 = new S3Client([
        'version' => 'latest',
        'region' => $region,
        'credentials' => [
            'key' => $awsAccessKeyId,
            'secret' => $awsSecretAccessKey,
        ],
    ]);


    $file = $_FILES;

    $filePath = $file['name']['tmp_name'];
    $objectKey = $file['name']['name'];
    $loc = "";


    // resize the file
  
    // $image->crop(636, 358, 25, 25);
    $resizedImageBinary =   $image->resize(null, 358, function ($constraint) {
        $constraint->aspectRatio();
    });

    // Convert image to binary
    $resizedImageBinary = $image->encode('jpg')->getEncoded();


    try {
        // Upload the file to S3
        $result = $s3->putObject([
            'Bucket' => $bucketName,
            'Key' => $objectKey,
            'Body'   => $resizedImageBinary,
            'ACL'    => 'public-read',
        ]);
    }catch(\Exception $th)
    {
        throw new Exception("Error Processing Request", 1);      
    }
    




public function resizeImage($img)
{
    $image = Image::make($filePath);
}
}