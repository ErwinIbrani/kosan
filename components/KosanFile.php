<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\web\NotFoundHttpException;

class KosanFile extends Component
{
  private $ext;

  public function getExt()
	{
      return '.'.$this->ext;
	}

   public function getCode($filename,$location)
   {
      $path = $location.'/'.$filename;

      return $this->getCrypt($path);
   }

  public function upload($file, $to, $filename)
 	{
 		if (!$file) {
 			return false;
 		}

 		$this->ext = strtolower(pathinfo($file->name,PATHINFO_EXTENSION));

 		$filename = $filename.'.'.$this->ext;

 		$basePath = $to;

 		if (!file_exists($basePath)) {
          mkdir($basePath, 0777, true);
       }

 		$path = $basePath.'/'.$filename;

 		if (move_uploaded_file($file->tempName, $path)) {
 		    return $filename;
 		} else {
 		   return false;
 		}
 	}

   public function getDownload($code)
   {
      $path = $this->getCrypt($code,'den');

      if (file_exists($path)) {
         // return $path;exit;
            return Yii::$app->response->sendFile($path);
        }else{
            throw new NotFoundHttpException('File not found.');
        }
   }

   public function getImage($code)
   {
      $path = $this->getCrypt($code,'den');
      if ($path) {

        return Yii::$app->response->sendFile($path)->send();
        // // open the file in a binary mode
        // $fp = fopen($path, 'rb');
        //
        // // send the right headers
        // header("Content-Type: image/png");
        // header("Content-Length: " . filesize($path));
        //
        // // dump the picture and stop the script
        // fpassthru($fp);
        // exit;
      }
   }

   private function getCrypt( $data, $num = 'en' ) {
      // you may change these values to your own
      $secret_key = 'KOS';
      $secret_iv = 'KOS';

      $output = false;
      $encrypt_method = "AES-256-CBC";
      $key = hash( 'sha256', $secret_key );
      $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

      if( $num == 'en' )
      {
         $output = base64_encode( openssl_encrypt( $data, $encrypt_method, $key, 0, $iv ) );
      }
      else if( $num == 'den' )
      {
         $output = openssl_decrypt( base64_decode( $data ), $encrypt_method, $key, 0, $iv );
      }


      return $output;
   }

   public function deleteDirectory($dir)
   {
     if (!file_exists($dir)) {
         return true;
     }

     if (!is_dir($dir)) {
         return unlink($dir);
     }

     foreach (scandir($dir) as $item) {
         if ($item == '.' || $item == '..') {
             continue;
         }

         if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
             return false;
         }

     }

     rmdir($dir);
   }
}
