<?php

namespace common\modules\cms\models;
use common\modules\media\models\CmsImages;

use Yii;

/**
 * This is the model class for table "cms_page".
 *
 * @property integer $ID
 * @property integer $CONTENT_ID
 * @property integer $TYPE
 * @property integer $ORDER
 * @property string $URL
 * @property string $CONTROLLER
 * @property string $METHOD
 * @property string $TITLE
 * @property integer $LAYOUT
 * @property integer $IS_HOME
 * @property integer $STATE
 * @property integer $POST_CATEGORY
 * @property integer $POST_ID
 * @property integer $HEADER_IMAGE
 * @property string $HEADER_TEXT
 * @property integer $SHOW_BREAD_CRUMBS
 * @property string $INTRO_TEXT
 * @property integer $INTRO_IMAGE
 * @property integer $HEADER_MASK
 * @property integer $PARENT_PAGE
 * @property integer $WRAP_CONTENT
 
 * @property CmsMenuItem[] $cmsMenuItems
 * @property CmsImages $hEADERIMAGE
 * @property CmsImages $iNTROIMAGE
 * @property CmsPage $pARENTPAGE
 * @property CmsPage[] $cmsPages
 * @property CmsPostContent $pOST
 * @property CmsImages $hEADERMASK
 * @property CmsCategory $pOSTCATEGORY
 * @property CmsLayout $lAYOUT
 * @property CmsPostContent $cONTENT
 * @property CmsWidgetPosition[] $cmsWidgetPositions
 */
class CmsPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CONTENT_ID', 'TYPE', 'ORDER', 'LAYOUT', 'IS_HOME', 'STATE', 'POST_CATEGORY', 'POST_ID', 'HEADER_IMAGE', 'SHOW_BREAD_CRUMBS', 'INTRO_IMAGE', 'HEADER_MASK', 'PARENT_PAGE', 'WRAP_CONTENT'], 'integer'],
            [['TYPE', 'TITLE'], 'required'],
            [['URL', 'CONTROLLER', 'METHOD', 'TITLE', 'HEADER_TEXT', 'INTRO_TEXT'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CONTENT_ID' => Yii::t('app', 'Content'),
            'TYPE' => Yii::t('app', 'Type'),
            'ORDER' => Yii::t('app', 'Order'),
            'URL' => Yii::t('app', 'Url'),
            'CONTROLLER' => Yii::t('app', 'Controller'),
            'METHOD' => Yii::t('app', 'Method'),
            'TITLE' => Yii::t('app', 'Title'),
            'LAYOUT' => Yii::t('app', 'Layout'),
            'IS_HOME' => Yii::t('app', 'Is  Home'),
            'STATE' => Yii::t('app', 'State'),
            'POST_CATEGORY' => Yii::t('app', 'Post  Category'),
            'POST_ID' => Yii::t('app', 'Post  ID'),
            'HEADER_IMAGE' => Yii::t('app', 'Header  Image'),
            'HEADER_TEXT' => Yii::t('app', 'Header  Text'),
            'SHOW_BREAD_CRUMBS' => Yii::t('app', 'Show  Bread Crumbs'),
            'INTRO_TEXT' => Yii::t('app', 'Intro  Text'),
            'INTRO_IMAGE' => Yii::t('app', 'Intro  Image'),
            'HEADER_MASK' => Yii::t('app', 'Header  Mask'),
            'PARENT_PAGE' => Yii::t('app', 'Parent  Page'),
            'WRAP_CONTENT' => Yii::t('app', 'Wrap  Content'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsMenuItems()
    {
        return $this->hasMany(CmsMenuItem::className(), ['PAGE' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHEADERIMAGE()
    {
        return $this->hasOne(CmsImages::className(), ['ID' => 'HEADER_IMAGE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getINTROIMAGE()
    {
        return $this->hasOne(CmsImages::className(), ['ID' => 'INTRO_IMAGE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentPage()
    {
        return CmsPage::findOne($this->PARENT_PAGE);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPages()
    {
        return $this->hasMany(CmsPage::className(), ['PARENT_PAGE' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPOST()
    {
        return $this->hasOne(CmsPostContent::className(), ['ID' => 'POST_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHEADERMASK()
    {
        return $this->hasOne(CmsImages::className(), ['ID' => 'HEADER_MASK']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPOSTCATEGORY()
    {
        return $this->hasOne(CmsCategory::className(), ['ID' => 'POST_CATEGORY']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLAYOUT()
    {
        return $this->hasOne(CmsLayout::className(), ['ID' => 'LAYOUT']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCONTENT()
    {
        return $this->hasOne(CmsPostContent::className(), ['ID' => 'CONTENT_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsWidgetPositions()
    {
        return $this->hasMany(CmsWidgetPosition::className(), ['PAGE' => 'ID']);
    }
    
    /**
     * Checks if the given page is descendant of $this page
     * @param type $page_id
     * @return boolean
     */
    public function isDescendant($page_id, $checkGrandparent = null) {
        
        // Get ancestor
        $ancestor = CmsPage::findOne($page_id);
        
        if($ancestor == null) {
            return false;
        }
              
        $parent_page = $this->getParentPage();
        
        if(($parent_page == null || $parent_page->PARENT_PAGE == null) && $checkGrandparent == false) {
            return false;
        }
        
        // Parent matches
        if($this->PARENT_PAGE == $ancestor->ID) {
            return true;
        }
        
        if($checkGrandparent == false) {
        
            return false;
        }

        if($parent_page==null) {        
            return false;
        }

        // Granparent matches
        if($parent_page->PARENT_PAGE == $ancestor->ID) {
            return true;
        }                
        
        return false;
    }
    
    public function getLink() {
       
        $menuItem = \common\modules\cms\models\CmsMenuItem::findOne([
            "STATE"=> \common\modules\cms\constants\CMSConstants::$CMS_CONTENT_STATE_PUBLISHED, 
            "PAGE" => $this->ID,
            "TYPE" => 0]);

        if($menuItem != null) {        
            $url = $menuItem->getURL();
           return \yii\helpers\Html::a($this->TITLE, $url, ["class"=>""]);
        } else {
            return "not found";
        }
       
   }
    
    public function getPagesPath() {
        $pages = [];
        $grandParent = null;
        $parent = null;
        
        if($this->PARENT_PAGE!=NULL)
            $parent = CmsPage::findOne($this->PARENT_PAGE);
        
        if($parent!=null && $parent->PARENT_PAGE!=NULL)
            $grandParent = CmsPage::findOne($parent->PARENT_PAGE);
        
        if($grandParent!=null)
            $pages[] = $grandParent;
        
        if($parent!=null)
            $pages[] = $parent;
                
        $pages[] = $this;
            
        return $pages;
    }
    
}
