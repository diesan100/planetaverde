<?php
namespace common\modules\cms\utils;

use common\modules\cms\constants\CMSConstants;
/*

/**
 * Description of CMSUtils
 *
 * @author Diego
 */
class CMSUtils {
    
    public static function getObjectTitle($type, $object_id) {
        /*print_r(" type=" . $type);
        print_r(" id=" . $object_id);*/
        $return_value = "";
        if($type == CMSConstants::$CMS_PAGE_POST) {
            $data = \common\modules\cms\models\CmsPostContent::findOne($object_id);
            if(isset($data) && $data != NULL) {
                $return_value =  $data->TITLE;
            } 
        } else if($type == CMSConstants::$CMS_PAGE_POST_CATEGORY) {
            $data = \common\modules\cms\models\CmsCategory::findOne($object_id);
            if(isset($data) && $data != NULL) {
                $return_value =  $data->TITLE;
            }
        } /*else if($type == CMSConstants::$CMS_PAGE_COURSE_LIST) {            
            $data = \common\modules\lms\models\EcProgram::findOne($object_id);
            if(isset($data) && $data != NULL) {
                $return_value =  $data->title;
            } 
        }*/
        
        //print_r(" return=" . $return_value);
        
        return $return_value;
            
    }
    
    public static function encodeTitle($title) {
        return str_replace(" ", "-", $title);
    }
    
    public static function decodeTitle($title) {
        return str_replace("-", " ", $title);
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
    
    public static function cropString($string, $limit) {
        if(strlen($string)<=$limit) {
		return $string;
	} else {		
		return substr($string, 0, $limit-3) . "...";
	}
    }
}
