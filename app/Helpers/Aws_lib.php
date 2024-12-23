<?php

use Aws\Credentials\Credentials;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Illuminate\Support\Facades\Log;

class Aws_lib
{

    private $s3_client;
    private $bucket_name;
    public $ext = '.idx';

    public function __construct($params = [false])
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 0);

        $endpoint = $params[0] ? env('AWS_SECOND_S3_ENDPOINT') : env('AWS_S3_ENDPOINT');
        $access_key_id = $params[0] ? env('AWS_SECOND_S3_ACCESS_KEY_ID') : env('AWS_S3_ACCESS_KEY_ID');
        $access_key_secret = $params[0] ? env('AWS_SECOND_S3_ACCESS_KEY_SECRET') : env('AWS_S3_ACCESS_KEY_SECRET');

        $this->s3_client = new S3Client([
            'region'        => 'auto',
            'endpoint'      => $endpoint,
            'version'       => 'latest',
            'credentials'   => new Credentials($access_key_id, $access_key_secret),
        ]);

        $this->bucket_name = $params[0] ? env('AWS_SECOND_S3_BUCKET_NAME') : env('AWS_S3_BUCKET_NAME');
    }

    public function list_obj($prefix = '')
    {
        $contents = $this->s3_client->listObjectsV2([
            'Bucket'    => $this->bucket_name,
            'Prefix'    => $prefix,
        ]);

        return $contents['Contents'];
    }

    public function get_obj($keyPrefix = '', $onlyHeadObject = false)
    {
        $options = [
            'Bucket'    => $this->bucket_name,
            'Key'       => $keyPrefix,
        ];

        try {
            if ($onlyHeadObject) {
                $contents = $this->s3_client->headObject($options)->get('@metadata');
            } else {
                $contents = $this->s3_client->getObject($options);
            }
        } catch (S3Exception $e) {
            return false;
        }

        return $contents;
    }

    public function upload_file($filepath = '', $keyPrefix = '')
    {
        $result = ['success' => true];
        try {
            $result['resp'] = $this->s3_client->putObject([
                'Bucket' => $this->bucket_name,
                'Key'    => $keyPrefix,
                'Body'   => fopen($filepath, 'r'),
                'ACL'    => 'public-read',
            ])->get('@metadata');
        } catch (S3Exception $e) {
            $result['success'] = false;
            $result['resp'] = $e->getMessage();
            Log::info("There was an error uploading the file \"$filepath\":\n{$result['resp']}");
        }

        return $result;
    }

    public function upload_content($content = '', $keyPrefix = '', $type = 'application/json')
    {
        $result = ['success' => true];
        try {
            $result['resp'] = $this->s3_client->putObject([
                'Bucket'        => $this->bucket_name,
                'Key'           => $keyPrefix,
                'Body'          => $content,
                'ContentType'   => $type,
                'ACL'           => 'public-read',
            ])->get('@metadata');
        } catch (S3Exception $e) {
            $result['success'] = false;
            $result['resp'] = $e->getMessage();
            Log::info("There was an error uploading the file to \"$keyPrefix\":\n{$result['resp']}");
        }

        return $result;
    }

    public function upload_dir($dirpath = '', $keyPrefix = '')
    {
        $result = ['success' => true];
        try {
            $this->s3_client->uploadDirectory($dirpath, $this->bucket_name, $keyPrefix);
            $result['resp'] = "Directory \"$dirpath\" uploaded successfully.";
        } catch (S3Exception $e) {
            $result['success'] = false;
            $result['resp'] = $e->getMessage();
            Log::info("There was an error uploading the dir \"$dirpath\":\n{$result['resp']}");
        }

        return $result;
    }

    public function copy_obj($src = '', $dst = '')
    {
        $result = ['success' => true];
        try {
            $result['resp'] = $this->s3_client->copyObject([
                'Bucket'        => $this->bucket_name,
                'CopySource'    => $this->bucket_name . '/' . $src,
                'Key'           => $dst,
            ])->get('@metadata');
        } catch (S3Exception $e) {
            $result['success'] = false;
            $result['resp'] = $e->getMessage();
            Log::info("There was an error copying the object(s) \"$src\":\n{$result['resp']}");
        }

        return $result;
    }

    public function move_obj($src = '', $dst = '')
    {
        $copyResult = $this->copy_obj($src, $dst);
        if ($copyResult['success'] and @$copyResult['resp']['statusCode'] == 200) {
            $result = $this->delete_obj($src);
        } else {
            $result = ['success' => false, 'resp' => null];
        }
        $result['copyResult'] = $copyResult;

        return $result;
    }

    public function delete_obj($prefix = '', $regex = '')
    {
        $result = ['success' => true];
        try {
            $this->s3_client->deleteMatchingObjects($this->bucket_name, $prefix, $regex);
            $result['resp'] = "Object(s) \"$prefix\" deleted successfully.";
        } catch (S3Exception $e) {
            $result['success'] = false;
            $result['resp'] = $e->getMessage();
            Log::info("There was an error deleting the object(s) \"$prefix\":\n{$result['resp']}");
        }

        return $result;
    }
}
