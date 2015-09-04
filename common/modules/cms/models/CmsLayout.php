<?php

namespace common\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_layout".
 *
 * @property integer $ID
 * @property string $LAYOUT
 * @property string $TITLE
 *
 * @property CmsLayoutSection[] $cmsLayoutSections
 * @property CmsPage[] $cmsPages
 */
class CmsLayout extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_layout';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LAYOUT', 'TITLE'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'LAYOUT' => Yii::t('app', 'Layout'),
            'TITLE' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsLayoutSections()
    {
        return $this->hasMany(CmsLayoutSection::className(), ['LAYOUT' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPages()
    {
        return $this->hasMany(CmsPage::className(), ['LAYOUT' => 'ID']);
    }
}
