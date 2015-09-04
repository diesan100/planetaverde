<?php

namespace common\modules\cms\models;

use Yii;
use common\modules\cms\utils\CMSUtils;

/**
 * This is the model class for table "cms_menu_item".
 *
 * @property integer $MENU
 * @property string $TITLE
 * @property integer $STATE
 * @property integer $ID
 * @property integer $PAGE
 * @property integer $ORDER
 * @property integer $PARENT_MENU
 * @property integer $TYPE
 * @property string $URL
 * @property string $IS_HOME
 *
 * @property CmsMenuItem $pARENTMENU
 * @property CmsMenuItem[] $cmsMenuItems
 * @property CmsPage $pAGE
 * @property CmsMenu $mENU
 */
class CmsMenuItem extends \yii\db\ActiveRecord
{
    
    public $children;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_menu_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MENU', 'STATE', 'PAGE', 'ORDER', 'TYPE', 'PARENT_MENU'], 'integer'],
            [['TITLE', 'STATE', 'ORDER'], 'required'],
            [['IS_HOME'], 'safe'],
            [['TITLE', 'URL'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MENU' => Yii::t('app', 'Menu'),
            'TITLE' => Yii::t('app', 'Title'),
            'STATE' => Yii::t('app', 'State'),
            'ID' => Yii::t('app', 'ID'),
            'PAGE' => Yii::t('app', 'Page'),
            'ORDER' => Yii::t('app', 'Order'),
            'PARENT_MENU' => Yii::t('app', 'Parent Item'),
            'TYPE' => Yii::t('app', 'Type'),
            'URL' => Yii::t('app', 'Url'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPARENTMENU()
    {
        return $this->hasOne(CmsMenuItem::className(), ['ID' => 'PARENT_MENU']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsMenuItems()
    {
        return $this->hasMany(CmsMenuItem::className(), ['PARENT_MENU' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPAGE()
    {
        return $this->hasOne(CmsPage::className(), ['ID' => 'PAGE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMENU()
    {
        return $this->hasOne(CmsMenu::className(), ['ID' => 'MENU']);
    }
    
    /**
     * Get the menu items tree recursively
     * @return type
     */
    public function getChildren() {
        
        if($this->children == null) {
            $children = CmsMenuItem::find()->where('STATE = :state_published AND PARENT_MENU = :parent_id', ['parent_id'=>$this->ID, 'state_published'=>  \common\modules\cms\constants\CMSConstants::$CMS_CONTENT_STATE_PUBLISHED])->all();
            if(isset($children) && sizeof($children)>0) {
                $this->children = $children;

                foreach ($children as $child) {
                    $child->getChildren();
                }

                return $children;
            } else {
                return [];
            }
        } else {
            return $this->children;
        }
    }
    
    public static function getAllChildren($menuId) {
        return $children_level_1 = CmsMenuItemSearch::findAll(["MENU" => $menuId, "PARENT_MENU" => null]);
        //var_dump($children_level_1);
    }
    
    /**
     * return true if the item has children
     * @return type
     */
    public function hasChildren() {
        if($this->children == null) {
            $this->getChildren();            
        }
        return (sizeof($this->children)>0)?true:false;
    }
    
    /**
     * return true if the item has granchildren
     * @return type
     */
    public function hasGrandchildren() {
        if(!$this->hasChildren()) {
            return false;
        } else {            
            foreach ($this->getChildren() as $child) {
                if ($child->getChildren()) {
                    return true;
                }
            }
            return false;
        }        
        
        
    }
    
    /**
     * Gets the URL for $this page
     */
    public function getURL() {
        
        $url1 = "";
        $url2 = "";
        $url3 = "/" . CMSUtils::encodeTitle($this->TITLE);
        
        if ($this->PARENT_MENU!=null) {
            $parent = CmsMenuItem::findOne($this->PARENT_MENU);
            
            if($parent != null && $parent->PARENT_MENU != null) {
                
                $url2 = "/" . CMSUtils::encodeTitle($parent->TITLE);
                
                $grandParent = CmsMenuItem::findOne($parent->PARENT_MENU);
                
                if($grandParent != null) {
                    $url1 = "/" . CMSUtils::encodeTitle($grandParent->TITLE);
                }
            }
        }
        
        
        return Yii::getAlias('@web') . $url1 . $url2 . $url3;
                    
    }
    
    /**
     * Calculates next order to add
     * 
     * @param type $menuId
     * @param type $parentItem
     * @return int
     */
    public static function getNextOrder($menuId, $parentItem = null) {
                
        $conditions = array();
        $conditions[] = ["MENU"=>$menuId];
        if($parentItem!=null) {
            $conditions[] = ["PARENT_MENU"=>$parentItem];
        }
        
        $menu_item = CmsMenuItem::find()->where(["MENU"=>$menuId])->orderBy('ORDER DESC')->one();
        
        if($menu_item == null) {
            return 1;
        } else {
            return (((int)$menu_item->ORDER) + 1);
        }
    }
   
}
