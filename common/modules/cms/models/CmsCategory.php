<?php

namespace common\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_category".
 *
 * @property integer $ID
 * @property integer $PARENT_CATEGORY
 * @property string $TITLE
 *
 * @property CmsCategory $pARENTCATEGORY
 * @property CmsCategory[] $cmsCategories
 * @property CmsPage[] $cmsPages
 * @property CmsPostContent[] $cmsPostContents
 */
class CmsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PARENT_CATEGORY'], 'integer'],
            [['TITLE'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'PARENT_CATEGORY' => Yii::t('app', 'Parent  Category'),
            'TITLE' => Yii::t('app', 'TITLE'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPARENTCATEGORY()
    {
        return $this->hasOne(CmsCategory::className(), ['ID' => 'PARENT_CATEGORY']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsCategories()
    {
        return $this->hasMany(CmsCategory::className(), ['PARENT_CATEGORY' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPages()
    {
        return $this->hasMany(CmsPage::className(), ['POST_CATEGORY' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPostContents()
    {
        return $this->hasMany(CmsPostContent::className(), ['CATEGORY' => 'ID']);
    }
}
