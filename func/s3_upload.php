<?php

require '../../includes/init.php';
require '../../vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

// AWS Info
$bucketName = BUCKET_NAME;
$IAM_KEY = IAM_KEY;
$IAM_SECRET = IAM_SECRET;

// Connect to AWS
try {
    $s3 = S3Client::factory(
        array(
            'credentials' => array(
                'key' => $IAM_KEY,
                'secret' => $IAM_SECRET
            ),
            'version' => 'latest',
            'region'  => 'eu-central-1'
        )
    );
} catch (Exception $e) {
    // We use a die, so if this fails. It stops here. Typically this is a REST call so this would
    // return a json object.
    die("Error: " . $e->getMessage());
}


// For this, I would generate a unqiue random string for the key name. But you can do whatever.
$keyName = 'mymarketplacelocal/' . basename($_FILES["fileToUpload"]['tmp_name']);
$pathInS3 = 'https://s3.eu-central-1.amazonaws.com/' . $bucketName . '/' . $keyName;

// Add it to S3
try {
    // Uploaded:
    $file = $_FILES["fileToUpload"]['tmp_name'];

    $s3->putObject(
        array(
            'Bucket'=>$bucketName,
            'Key' =>  $keyName,
            'SourceFile' => $file,
            'StorageClass' => 'REDUCED_REDUNDANCY'
        )
    );

} catch (S3Exception $e) {
    die('Error:' . $e->getMessage());
} catch (Exception $e) {
    die('Error:' . $e->getMessage());
}
