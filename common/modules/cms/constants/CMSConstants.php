<?php
namespace common\modules\cms\constants;

class CMSConstants {
	/*public static $SIMPLE_POST_PAGE = 0;
	public static $CATEGORY_POST_PAGE = 1;
        public static $FRONT_SIGNUP_PAGE = 2;
        public static $FRONT_LOGIN_PAGE = 3;
        public static $FRONT_HOME = 4;
        public static $FRONT_DESTINATION = 5;
        public static $FRONT_CONTACT = 6;
        public static $FRONT_WISHLIST = 7;*/
        
	public static $CMS_PAGE_TYPES = [
            '0' => 'Simple post', 
            '1' => 'Post category', 
            '2' => 'Frontsite Signup', 
            '3' => 'Frontsite login',
            '4' => 'Home', 
            '5' => 'Destination', 
            '6' => 'Contact', 
            '7' => 'Wishlist'] ;
	
        public static $CMS_PAGE_POST = 0;
        public static $CMS_PAGE_POST_CATEGORY = 1;
        public static $CMS_PAGE_FRONT_SIGNUP = 2;
        public static $CMS_PAGE_FRONT_LOGIN = 3;
        public static $CMS_PAGE_HOME = 4;
        public static $CMS_PAGE_DESTINATION = 5;
        public static $CMS_PAGE_CONTACT = 6;
        public static $CMS_PAGE_WISHLIST = 7;
        
	public static $MENU_WIDGET_TYPE = 0;
	public static $SLIDER_WIDGET_TYPE = 1;
	public static $WIDGET_TYPES = ['0' => 'Menu', '1' => 'Slider'] ;
	
	public static $CMS_CONTENTS_STATES = ['0' => 'Draft', '1' => 'Published', '2' => 'Deleted'] ;
        public static $CMS_CONTENT_STATE_DRAFT = 0;
        public static $CMS_CONTENT_STATE_PUBLISHED = 1;
        public static $CMS_CONTENT_STATE_DELETED = 2;
        
        public static $CMS_MENU_ITEM_TYPES = ['0' => 'Internal Page', '1' => 'URL'];
        
        public static $USER_TYPE_CLIENT = 1;
        public static $USER_TYPE_ADMIN = 2;
}
?>