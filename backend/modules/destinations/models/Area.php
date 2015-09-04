<?php

namespace backend\modules\destinations\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property integer $id
 * @property integer $parent
 * @property string $name
 * @property string $description
 * @property integer $state
 * @property integer $type
 * @property string $coords_in_parent
 * @property integer $map_image
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'state', 'type', 'map_image'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1200],
            [['coords_in_parent'], 'string', 'max' => 2000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent' => Yii::t('app', 'Parent'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'state' => Yii::t('app', 'State'),
            'type' => Yii::t('app', 'Type'),
            'coords_in_parent' => Yii::t('app', 'Coords In Parent'),
            'map_image' => Yii::t('app', 'Map Image'),
        ];
    }
    
    public function getChildren() {
        return AreaSearch::findAll(["parent"=>$this->id]);
    }
    
    public function getUrl() {
        return $this->name;
    }
}
