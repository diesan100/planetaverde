<?php

namespace common\modules\media\models;

use Yii;

/**
 * This is the model class for table "cms_images".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $MIME
 * @property string $URL
 * @property integer $WIDTH
 * @property integer $HEIGHT
 * @property integer $OWNER
 * @property string $META
 * @property string $DESCRIPTION
 * @property string $CREATED
 * @property string $UPDATED
 */
class CmsImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['WIDTH', 'HEIGHT', 'OWNER'], 'integer'],
            [['NAME'], 'string', 'max' => 50],
            [['MIME', 'URL', 'META', 'DESCRIPTION'], 'string', 'max' => 255]
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
            'MIME' => Yii::t('app', 'Mime'),
            'URL' => Yii::t('app', 'Url'),
            'WIDTH' => Yii::t('app', 'Width'),
            'HEIGHT' => Yii::t('app', 'Height'),
            'OWNER' => Yii::t('app', 'Owner'),
            'META' => Yii::t('app', 'Meta'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
        ];
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
                   \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['CREATED', 'UPDATED'],
                   \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => 'UPDATED',
               ],
               'value' => new \yii\db\Expression('NOW()'),
           ],
       ];
   } 
   
   public static function getImageTag($id, $params=null) {
       $image = CmsImages::findOne($id);
       $url = Yii::getAlias(Yii::getAlias("@frontend_web")) . "/" . $image->URL;
       $params_string = "";
       if(isset($params)) {
           
           foreach ($params as $key => $value) {
               $params_string .= $key ."='".$value."'";
           }
               
           
       }
       return '<img src="' . $url . '" '.$params_string.'>';
   }
}
