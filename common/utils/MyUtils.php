<?php
namespace common\utils;

use Yii;
use common\models\File;
use yii\helpers\Url;

/**
 * Description of Utilidades
 *
 * @author Diego
 */
class MyUtils {
    
    public static function mysqlDate2String($date, $lang = NULL) {
        $time = strtotime($date);
        $myFormatForView = date("d/m/Y", $time);
        return $myFormatForView;
    }
    
    public static function encodeTitle($title) {
        return str_replace(" ", "_", $title);
    }
    
    public static function decodeTitle($title) {
        return str_replace("_", " ", $title);
    }
    
    /**
     * Devuelve el almacenamiento en la unidad necesaria de acuerdo al 
     * espacio utilizado. Hasta 100Mb devuevle Mb, A partir de ahí lo devuelve
     * en Gb.
     * 
     * @return int
     */
    public static function getNormalizedUsedStorage($used_storage) {
        //return $used_storage;
        if($used_storage == null | $used_storage == "")
            return "0 bytes";
        if($used_storage == 0) {
            return "0 Gb";
        } else if ($used_storage >= 1000000000 ) {
            return number_format(($used_storage / 1000000000),2) . " Gb";
        } else if ($used_storage < 10000 ) {
            return number_format(($used_storage / 1000),2) . " Kb";
        } else {
            return number_format(( ($used_storage / 1000) /1000 ),2) . " Mb";
        }
    }
    
    /**
     * Devuelve el almacenamiento en la unidad necesaria de acuerdo al 
     * espacio utilizado. Hasta 100Mb devuevle Mb, A partir de ahí lo devuelve
     * en Gb.
     * 
     * @return int
     */
    public static function getNormalizedUsedStorageByProject($project) {
        return MyprojecttUtils::getNormalizedUsedStorage($project->used_storage);
    }

    /**
     * Obtiene el path del proyecto para mostrar en el menú de migas.
     * 
     * @param type $project
     * @param type $folder_id
     * @return type
     */
    public static function getPath($project, $folder_id = null) {
        
        $array = [];
        
        if(isset($folder_id) && $folder_id!=null) {
            
            $folder = File::findOne($folder_id);
            $array[] = ['label' => $folder->name, 'url' => Url::to(["//".MyprojecttUtils::encodeTitle($project->title)."/explorer/".$folder->id])];
            
            while($folder->parent!=null) {
                $folder = File::findOne($folder->parent);
                $array[] = ['label' => $folder->name, 'url' => Url::to(["//".MyprojecttUtils::encodeTitle($project->title)."/explorer/".$folder->id])];
            }
        }
        
        $array[] = ['label' => Yii::t("app", "Inicio"), 'url' => Url::to(["//".MyprojecttUtils::encodeTitle($project->title)."/explorer"])];
        //$array[] = ['label' => $project->title, 'url' => Url::to(["//".MyprojecttUtils::encodeTitle($project->title)."/explorer"])];
        //$array[] = ['label' => Yii::t("app", "Proyectos"), 'url' => Url::to(['//projects/site/index'])];
        
        $inverseArray = [];
        
        // Loop the index upside down
        for($i=sizeof($array)-1; $i>=0; $i--) {
            if($i==0) {
                // This is the last -current- item, no link
                $inverseArray[] = $array[$i]['label'];
            } else {                
                $inverseArray[] = $array[$i];               
            }
        } 
        
        // If the path is too long, we have to make it shorter
        if(sizeof($array)>5) {
            $shortArray = Array();
            $shortArray[0] = $inverseArray[0]; // Start
            $shortArray[2] = $inverseArray[1]; // Proyecto
            $shortArray[3] = $inverseArray[3]; // Primer nivel
            $shortArray[4] = "..."; // Primer nivel
            $shortArray[5] = $inverseArray[sizeof($inverseArray)-2]; // Before last
            $shortArray[6] = $inverseArray[sizeof($inverseArray)-1]; // Last
            
            return $shortArray;
        } else {        
            return $inverseArray;
        }
        
        
        
    }
    
    public static function cropFileName($string, $limit) {
        if(strlen($string)<=$limit) {
		return $string;
	} else {
		$part1 = substr($string, 0, (strlen($string) - (strlen($string) - $limit)) - 10);
		$part2 = substr($string, strlen($string) - 7, strlen($string));
		return $part1 . "..." . $part2;
	}
    }
    
    public static function cropName($string, $limit) {
        if(strlen($string)<=$limit) {
		return $string;
	} else {		
		return substr($string, 0, $limit-3) . "...";
	}
    }
    
    // Function to remove folders and files 
    public static function rrmdir($dir) {
        if (is_dir($dir)) {
                       
            $files = scandir($dir);
            foreach ($files as $file)
                if ($file != "." && $file != "..") MyprojecttUtils::rrmdir("$dir/$file");
            rmdir($dir);                          
            
        }
        else if (file_exists($dir)) unlink($dir);
    }

    // Function to Copy folders and files       
    public static function rcopy($src, $dst) {
        if (file_exists ( $dst ))
            MyprojecttUtils::rrmdir ( $dst );
        if (is_dir ( $src )) {
            mkdir ( $dst );
            $files = scandir ( $src );
            foreach ( $files as $file )
                if ($file != "." && $file != "..")
                    rcopy ( "$src/$file", "$dst/$file" );
        } else if (file_exists ( $src ))
            copy ( $src, $dst );
    }
    
    /**
     * Obtiene el nombre de usuario:
     * 
     * 1º- Intenta recuperarlo de la base de datos de usuarios
     * 2º- Sino existe ese usuario, es porque aún no ha aceptado la invitación, es decir,
     * no se ha registrado.
     * 
     * @param type $email
     * @param type $length
     * @return type
     */
    public static function getSmartUserName($email, $length=null) {
        $name = "";
        $user = common\models\User::findOne(["email"=>$email]);
        if($user != null) {
            $name = $user->getFullName();
        } else {
            $invitation = \common\models\Invitation::findOne(["email"=>$email]);
            $name =  $invitation->name;
        } 
        if(isset($length) && $length!=null) {
            return MyprojecttUtils::cropFileName($name, $length);
        } else {
            return $name;
        }
    }
    
    /**
     * Obtiene el usuario encapsulado en common\utils\models\SmartUser
     * 
     * 1º- Intenta recuperarlo de la base de datos de usuarios
     * 2º- Sino existe ese usuario, es porque aún no ha aceptado la invitación, es decir,
     * no se ha registrado.
     * 
     * @param type $email
     * @param type $length
     * 
     * @return common\utils\models\SmartUser
     */
    public static function getSmartUser($email, $length=null) {
        $smartUser = new \common\utils\models\SmartUser();
        
        $name = "";
        $user = common\models\User::findOne(["email"=>$email]);
        
        if($user != null) {
            $name = $user->getFullName();
            $smartUser->isSignedUp = true;
            $smartUser->user = $user;
        } else {
            $invitation = \common\models\Invitation::findOne(["email"=>$email]);
            $name = $invitation->name;
            $smartUser->isSignedUp = false;
        } 
        
        if(isset($length) && $length!=null) {
            $smartUser->fullName =  MyprojecttUtils::cropFileName($name, $length);            
        } else {
            $smartUser->fullName =  $name;
        }
        
        return $smartUser;
    }

    /**
     * 
     * @return type
     */
    public static function getFormattedTime($timestamp) {
        $UTC = new \DateTimeZone("UTC");
        //$newTZ = new \DateTimeZone("Europe/Madrid");
        $date = new \DateTime( $timestamp, $UTC );
        //$date->setTimezone( $newTZ );
        return $date->format('H:i');

        //return date("H:i", strtotime($timestamp));
    }
    
    /**
     * 
     * @return type
     */
    public static function getFormattedDate($timestamp, $justDate=null) {
        
        $todayDate = date("Y-m-d");
        $diff = date_diff(date_create($todayDate), date_create($timestamp))->format('%a');
        
        if(isset($justDate) && $justDate == true) {
            return date("d/m/Y", strtotime($timestamp));
        }
        
        if($diff == 0) {
            $diff_horas = date_diff(new \DateTime(), date_create($timestamp))->format('%h');
            if(((int)$diff_horas) > ((int)date("h"))) {
                return Yii::t("app", "Ayer");
            } else {
                return Yii::t("app", "Hoy");
            }
        } else if ($diff == 1) {
            return Yii::t("app", "Ayer");
        } else if ($diff < 8 ) {
            return Yii::t("app", "Hace {numDias} días", ["numDias"=>$diff]);
        } else {
            $UTC = new \DateTimeZone("UTC");
            //$newTZ = new \DateTimeZone("Europe/Madrid");
            $date = new \DateTime( $timestamp, $UTC );
            //$date->setTimezone( $newTZ );
            return $date->format("d/m/Y");
            //return date("d/m/Y", strtotime($timestamp));
        }
    }
    
    /**
     * getIdsArray
     * @param type $objects
     * @return type
     */
    public static function getIdsArray($objects) {
        $array = Array();
        foreach ($objects as $object) {
            $array[] = $object->id;
        }
        return $array;
    }
    
    /**
     * getIdsArray
     * @param type $objects
     * @return type
     */
    public static function getIndexArray($objects, $index) {
        $array = Array();
        foreach ($objects as $object) {
            $array[] = $object[$index];
        }
        return $array;
    }
    
    
    /**
     * getIdsArray
     * @param type $objects
     * @return type
     */
    public static function getIndexPlainArray($objects, $index) {
        $array = "";
        foreach ($objects as $object) {
            $array .= $object[$index] . ",";
        }
        return rtrim($array, ",");
    }
    
    /**
     * getIdsArray
     * @param type $objects
     * @return type
     */
    public static function getIdsPlainArray($objects) {
        $array = "";
        foreach ($objects as $object) {
            $array .= $object->id . ",";
        }
        return rtrim($array, ",");
    }
    
    public static function getUploadsAbsoluteFile() {
        $uploadsAbsolutePath = Yii::getAlias("@usersbackend") . DIRECTORY_SEPARATOR . "web" . DIRECTORY_SEPARATOR . "uploads";
        return $uploadsAbsolutePath;
    }
    
    
    public static function findFiles($source_folder, $pattern) {
        //$fname='*.zip';
        $result = Array();
        
        $match=glob($source_folder . DIRECTORY_SEPARATOR.$pattern,GLOB_NOSORT);
        if($match) {
            $result = $match;
        }
        
        foreach(MyprojecttUtils::findAllDirs($source_folder) as $dir) {
            $match=glob($dir . DIRECTORY_SEPARATOR.$pattern,GLOB_NOSORT);
            if(!$match) { 
                continue;
            } else {
                $result[]=$match[0];
            }
        }
        return $result;
    }
    
    private static function findAllDirs($start) {
            $dirStack=[$start];
            $result = Array();
            while($dir=array_shift($dirStack)) {
                $ar=glob($dir.'/*',GLOB_ONLYDIR|GLOB_NOSORT);
                if(!$ar) continue;

                $dirStack=array_merge($dirStack,$ar);
                foreach($ar as $dir) {
                    $result[] = $dir;
                    //(yield $dir);
                }
            }
            return $result;
        }
    
    public static function glob_files($source_folder, $ext, $sec, $limit){
        if( !is_dir( $source_folder ) ) {
            die ( "Invalid directory.\n\n" );
        }

        $FILES = glob($source_folder."\*.".$ext);
        $set_limit    = 0;

        foreach($FILES as $key => $file) {

            if( $set_limit == $limit )    break;

            if( filemtime( $file ) > $sec ){

                $FILE_LIST[$key]['path']    = substr( $file, 0, ( strrpos( $file, "\\" ) +1 ) );
                $FILE_LIST[$key]['name']    = substr( $file, ( strrpos( $file, "\\" ) +1 ) );    
                $FILE_LIST[$key]['size']    = filesize( $file );
                $FILE_LIST[$key]['date']    = date('Y-m-d G:i:s', filemtime( $file ) );
                $set_limit++;

            }

        }
        if(!empty($FILE_LIST)){
            return $FILE_LIST;
        } else {
            die( "No files found!\n\n" );
        }
    }
    
    /**
     * Zips a folder recursively and [optionally] delete files after
     * 
     * @param type $folder2Zip source folder to be zipped
     * @param type $outFilePath generated zip file path
     * @param type $deleteAfter whether the files will be delted or not
     */
    public static function zipFolder($folder2Zip, $outFilePath, $deleteAfter) {
        
        
        // Get real path for our folder
        $rootPath = realpath($folder2Zip);

        // Initialize archive object
        $zip = new \ZipArchive();
        $zip->open($outFilePath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        // Initialize empty "delete list"
        //$filesToDelete = array();

        // Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($rootPath),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file)
        {
            /*if($file!=".." && $file!=".") {
                $filesToDelete[] = $file;
            }*/
            
            // Skip directories (they would be added automatically)
            if (!$file->isDir())
            {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);

                // Add current file to archive
                $zip->addFile($filePath, $relativePath);                
            }
        }

        // Zip archive will be created only after closing object
        $zip->close();
        
        /*
        if($deleteAfter == true) {
            // Delete all files from "delete list"
            foreach ($filesToDelete as $file)
            {
                if($file->isDir()) {

                    MyprojecttUtils::rrmdir($file);
                } else {

                    unlink($file);
                }  
                }
            }       
        }*/
        
    }
    
    
    /**
     * Borra todos los ficheros zip del usuario
     * @param type $userId
     */
    public static function deleteTmpFiles($userId, $noDate) {
        
        $userFolder = common\models\User::getUserFolder($userId);
        
        $result = MyprojecttUtils::findFiles($userFolder, "*tmp_*");
        
        if(sizeof($result)>0) {
            for ($i=0 ; $i<sizeof($result); $i++) {
                if(!isset($noDate) || $noDate == false) {
                    $mdate = date("Ymd", filemtime($result[$i]));
                    $date  = date("Ymd");
                    if ($mdate < $date) {
                        // Borramos los que son anteriores a hoy
                        if(is_dir($result[$i])) {
                            MyprojecttUtils::rrmdir($result[$i]);
                        } else {
                            unlink($result[$i]);
                        }
                    }
                } else {                    
                    if(is_dir($result[$i])) {
                        MyprojecttUtils::rrmdir($result[$i]);
                    } else {
                        unlink($result[$i]);
                    }
                    
                }
            }
        }
    }
}