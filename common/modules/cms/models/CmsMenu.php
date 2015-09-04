<?php

namespace common\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_menu".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $POSITION
 * @property integer $TEMPLATE
 *
 * @property CmsMeuItem[] $cmsMeuItems
 * @property CmsPage[] $pAGEs
 * @property CmsWidgetPosition[] $cmsWidgetPositions
 * @property TemplateMenuAssoc[] $templateMenuAssocs
 */
class CmsMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TEMPLATE'], 'integer'],
            [['NAME'], 'string', 'max' => 50],
            [['POSITION'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'NAME' => Yii::t('app', 'Name'),
            'POSITION' => Yii::t('app', 'Position'),
            'TEMPLATE' => Yii::t('app', 'Template'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsMenuItems()
    {
        return $this->hasMany(CmsMenuItem::className(), ['MENU' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPAGEs()
    {
        return $this->hasMany(CmsPage::className(), ['ID' => 'PAGE'])->viaTable('cms_meu_item', ['MENU' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsWidgetPositions()
    {
        return $this->hasMany(CmsWidgetPosition::className(), ['WIDGET_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemplateMenuAssocs()
    {
        return $this->hasMany(TemplateMenuAssoc::className(), ['MENU_ID' => 'ID']);
    }
    
    /**
     * Override before delete
     * Delete menu items dependind on this menu
     * @return type
     */
    public function beforeDelete()
    {
        CmsMenuItem::deleteAll(["MENU"=>$this->ID]);
        return parent::beforeDelete();
    }
}
