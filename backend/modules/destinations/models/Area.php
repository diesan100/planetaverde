<?php

namespace backend\modules\destinations\models;

use Yii;
use common\modules\cms\models\CmsPostContent;

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
 * 
 * @property Area[] 			$subAreas
 * @property CmsPostContent[] 	$posts 
 * @property Lodge[] 			$lodges
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
            [['parent', 'state', 'type', 'map_image', 'featured'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1200],
            [['coords_in_parent'], 'string', 'max' => 2000],
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
            'featured' => Yii::t('app', 'Featured'),
        ];
    }
    
    public function getSubAreas()
    {
    	return $this->hasMany(Area::className(), ['parent_id'=>'id']);
    }
    
    public function getPosts()
    {
    	return $this->hasMany(CmsPostContent::className(), ['area_id'=>'id'])->where('STATE=1')->orderBy('LAST_MODIFIED');
    }
    
    public function getLodges()
    {
    	return $this->hasMany(Lodge::className(), ['area_id'=>'id']);
    }
    
    public function getParent()
    {
    	if($this->parent)
    	{
    		return Area::findOne($this->parent);
    	}
    	return null;
    }
    
    public function getChildren() {
        return AreaSearch::findAll(["parent"=>$this->id]);
    }
    
    public function getUrl() {
        //return $this->name;
        return yii::$app->request->baseUrl. '/Destinations/'. $this->id;
    }
    
    /**
     * Returns array of news for the area
     * @param boolean $onlyForMe = false  
     * @return CmsPostContent[]
     */
    public function getNews($onlyForMe = false) {
    	if($onlyForMe)
    		return $this->posts;
    	
    	$news = [];
    	$p = $this;
    	while($p)
    	{
    		$news = array_merge($news, $p->posts);
    		$p = $p->getParent();
    	}
    	return $news;
    }
    
    /**
     * 
     * @param boolean $reverse_order
     * @return array:
     */
    public function getAreaRoute($reverse_order = true)
    {
    	$route = [];
    	$p = $this;
    	while($p)
    	{
    		array_push($route, ['id'=>$p->id, 'name'=>$p->name]);
    		$p = $p->getParent();
    	}
    	if($reverse_order)
    		return $route;
    	else 
    		return array_reverse($route);
    }
}
