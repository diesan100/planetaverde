<?php

namespace common\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_layout_section".
 *
 * @property integer $ID
 * @property string $NAME
 * @property integer $LAYOUT
 *
 * @property CmsLayout $lAYOUT
 * @property CmsWidgetPosition[] $cmsWidgetPositions
 * @property CmsSlider[] $wIDGETs
 */
class CmsLayoutSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_layout_section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LAYOUT'], 'integer'],
            [['NAME'], 'string', 'max' => 255]
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
            'LAYOUT' => Yii::t('app', 'Layout'),
        ];
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
    public function getCmsWidgetPositions()
    {
        return $this->hasMany(CmsWidgetPosition::className(), ['LAYOUT_SECTION' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWIDGETs()
    {
        return $this->hasMany(CmsSlider::className(), ['ID' => 'WIDGET_ID'])->viaTable('cms_widget_position', ['LAYOUT_SECTION' => 'ID']);
    }
}
