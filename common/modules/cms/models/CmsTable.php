<?php

namespace common\modules\cms\models;

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
 * @property string $HEADER_MASK
 *
 * @property CmsMenuItem[] $cmsMenuItems
 * @property CmsPostContent $pOST
 * @property CmsCategory $pOSTCATEGORY
 * @property CmsLayout $lAYOUT
 * @property CmsPostContent $cONTENT
 * @property CmsWidgetPosition[] $cmsWidgetPositions
 */
class CmsTable extends \yii\db\ActiveRecord
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
            [['CONTENT_ID', 'TYPE', 'ORDER', 'LAYOUT', 'IS_HOME', 'STATE', 'POST_CATEGORY', 'POST_ID', 'HEADER_IMAGE', 'SHOW_BREAD_CRUMBS', 'INTRO_IMAGE'], 'integer'],
            [['TYPE', 'TITLE'], 'required'],
            [['URL', 'CONTROLLER', 'METHOD', 'TITLE', 'HEADER_TEXT', 'INTRO_TEXT', 'HEADER_MASK'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CONTENT_ID' => Yii::t('app', 'Content  ID'),
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
            'SHOW_BREAD_CRUMBS' => Yii::t('app', 'Show  Bread  Crumbs'),
            'INTRO_TEXT' => Yii::t('app', 'Intro  Text'),
            'INTRO_IMAGE' => Yii::t('app', 'Intro  Image'),
            'HEADER_MASK' => Yii::t('app', 'Header  Mask'),
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
    public function getPOST()
    {
        return $this->hasOne(CmsPostContent::className(), ['ID' => 'POST_ID']);
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
}
