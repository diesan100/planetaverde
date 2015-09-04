<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace common\modules\cms\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use \yii\helpers\Url;
use common\modules\cms\constants\CMSConstants;
use common\modules\cms\models\CmsMenuItem;
use common\modules\cms\models\CmsWPositionExtended;

use \Yii;

class BreadcrumbsWidget extends Widget
{
    // Current CMS Page
    public $current_page;

    
    public function init()
    {
        parent::init();

    }

    public function run()
    {                
        $pagesPath = $this->current_page->getPagesPath();
        
        return $this->render("breadcrumbs", ["pagesPath"=>$pagesPath]);
    }
}

?>

