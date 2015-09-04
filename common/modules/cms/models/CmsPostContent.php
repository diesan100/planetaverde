<?php

namespace common\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_post_content".
 *
 * @property integer $ID
 * @property string $CONTENT
 * @property integer $STATE
 * @property string $CREATION_DATE
 * @property string $LAST_MODIFIED
 * @property integer $OWNER
 * @property integer $MODIFIED_BY
 * @property string $PERMALINK
 * @property integer $CATEGORY
 * @property integer $VERSION_ID
 * @property string $TITLE
 * @property integer $FEATURED_IMG
 * @property string $META_DATA
 *
 * @property CmsPage[] $cmsPages
 * @property CmsCategory $cATEGORY
 * @property User $oWNER
 */
class CmsPostContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_post_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CONTENT'], 'string'],
            [['STATE', 'OWNER', 'CATEGORY', 'VERSION_ID', 'FEATURED_IMG'], 'integer'],
            [['CREATION_DATE', 'LAST_MODIFIED', 'MODIFIED_BY'], 'safe'],
            [['PERMALINK', 'TITLE', 'META_DATA'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CONTENT' => Yii::t('app', 'Content'),
            'STATE' => Yii::t('app', 'State'),
            'CREATION_DATE' => Yii::t('app', 'Creation  Date'),
            'LAST_MODIFIED' => Yii::t('app', 'Last  Modified'),
            'OWNER' => Yii::t('app', 'Owner'),
            'PERMALINK' => Yii::t('app', 'Permalink'),
            'CATEGORY' => Yii::t('app', 'Category'),
            'VERSION_ID' => Yii::t('app', 'Version  ID'),
            'TITLE' => Yii::t('app', 'Title'),
            'FEATURED_IMG' => Yii::t('app', 'Featured  Img'),
            'META_DATA' => Yii::t('app', 'Meta  Data'),
            'MODIFIED_BY' => Yii::t('app', 'Modified By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPages()
    {
        return $this->hasMany(CmsPage::className(), ['CONTENT_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCATEGORY()
    {
        return $this->hasOne(CmsCategory::className(), ['ID' => 'CATEGORY']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOWNER()
    {
        return $this->hasOne(User::className(), ['ID' => 'OWNER']);
    }
    
    /**
    * @inheritdoc
    */
   public function behaviors()
   {
       return [
           'timestamp' => [
               'class' => \yii\behaviors\TimestampBehavior::className(),
               'attributes' => [
                   \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['CREATION_DATE', 'LAST_MODIFIED'],
                   \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => 'LAST_MODIFIED',
               ],
               'value' => new \yii\db\Expression('NOW()'),
           ],
           'blameable' => [
                'class' => \yii\behaviors\BlameableBehavior::className(),
                'attributes' => [
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['OWNER', 'MODIFIED_BY'],
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => 'MODIFIED_BY'
                ],                
            ],
       ];
   } 
}
