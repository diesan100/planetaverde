<?php

namespace common\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_widget_position".
 *
 * @property integer $WIDGET_ID
 * @property integer $ORDER
 * @property integer $TYPE
 * @property integer $LAYOUT_SECTION
 * @property integer $ID
 * @property integer $PAGE
 *
 * @property CmsLayoutSection $lAYOUTSECTION
 * @property CmsPage $pAGE
 */
class CmsWidgetPosition extends \yii\db\ActiveRecord
{
	public $WIDGET;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_widget_position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['WIDGET_ID', 'ORDER', 'TYPE', 'LAYOUT_SECTION', 'PAGE'], 'integer'],
            [['LAYOUT_SECTION'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'WIDGET_ID' => Yii::t('app', 'Widget  ID'),
            'ORDER' => Yii::t('app', 'Order'),
            'TYPE' => Yii::t('app', 'Type'),
            'LAYOUT_SECTION' => Yii::t('app', 'Layout  Section'),
            'ID' => Yii::t('app', 'ID'),
            'PAGE' => Yii::t('app', 'Page'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLAYOUTSECTION()
    {
        return $this->hasOne(CmsLayoutSection::className(), ['ID' => 'LAYOUT_SECTION']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPAGE()
    {
        return $this->hasOne(CmsPage::className(), ['ID' => 'PAGE']);
    }
}
