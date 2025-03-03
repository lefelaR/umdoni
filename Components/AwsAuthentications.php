<?php
namespace Components;
class AwsAuthentications{



    private $bucketName;
    private $awsAccessKeyId;
    private $clientId;
    private $userPoolId;
    private $region;
    private $awsSecretAccessKey; 

    public function __construct() {
        
        $this->awsAccessKeyId  = $_ENV['AWS_ACCESS_KEY_ID'];
        $this->clientId = $_ENV['AWS_COGNITO_CLIENT_ID'];
        $this->userPoolId = $_ENV['AWS_COGNITO_USER_POOL_ID'];
        $this->region = $_ENV['AWS_REGION'];
        $this->awsSecretAccessKey  =  $_ENV['AWS_SECRET_ACCESS_KEY'];
        $this->bucketName = $_ENV['BUCKET_NAME'];
    }

    public function getAwsAccessKeyId() {
        return $this->awsAccessKeyId;
    }
    public function getClientId() {
        return $this->clientId;
    }
    public function getUserPoolId() {
        return $this->userPoolId;   
    }
    public function getRegion() {
        return $this->region;
    }
    public function getAwsSecretAccessKey()
    {
        return $this->awsSecretAccessKey;
    }
    public function getBucketName() {
        return $this->bucketName;
    }
}