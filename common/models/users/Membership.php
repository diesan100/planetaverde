<?php

namespace usersbackend\modules\users\models;

use Yii;

/**
 * This is the model class for table "membership".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $current_plan
 * @property string $created_at
 * @property string $updated_at
 * @property string $next_payment
 * @property integer $free
 * @property integer $used_storage
 * @property integer $limit_storage
 * @property integer $used_projects
 * @property integer $limit_projects
 * @property integer $state
 * @property integer $alert_80
 * @property integer $alert_90
 * @property integer $alert_100
 * @property string $paypal_profile_id
 * @property string $gateway_type
 * @property string $promo_code
 * @property integer $promo_used_months
 * @property integer $non_payment
 * @property integer $frozen
 * @property integer $non_payment_reminders
 */
class Membership extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE_FREE = 10;
    const STATUS_SIGNING_UP_NOT_FREE = 20;
    const STATUS_ACTIVE_NOT_FREE = 30;
    const STATUS_BANNED = 40;
    const STATUS_DELETED = 50;
    const STATUS_PROCESSING_PAYMENT = 60;
    
    const TYPE_GATEWAY_PAYPAL = "Paypal";
    const TYPE_GATEWAY_REDSYS = "RSys";
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'membership';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id','current_plan', 'free', 'used_storage', 'used_projects', 'limit_projects', 'alert_80', 'alert_90', 'alert_100', 'promo_used_months', 'non_payment', 'frozen', 'non_payment_reminders'], 'integer'],
            [['created_at', 'updated_at', 'next_payment', 'state', 'paypal_profile_id', 'gateway_type', 'promo_code'], 'safe'],
            [['limit_storage'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'current_plan' => Yii::t('app', 'Plan actual'),
            'user_id' => Yii::t('app', 'Usuario propietario'),
            'created_at' => Yii::t('app', 'Creado'),
            'updated_at' => Yii::t('app', 'Actualizado'),
            'next_payment' => Yii::t('app', 'Próximo pago previsto'),
            'free' => Yii::t('app', 'Gratuito'),
            'used_storage' => Yii::t('app', 'Espacio utilizado'),
            'limit_storage' => Yii::t('app', 'Limite de espacio'),
            'used_projects' => Yii::t('app', 'Proyectos utilizados'),
            'limit_projects' => Yii::t('app', 'Límite de proyectos'),
            'alert_80' => Yii::t('app', 'Alerta 80% alcanzada'),
            'alert_90' => Yii::t('app', 'Alerta 90% alcanzada'),
            'alert_100' => Yii::t('app', 'Alerta 100% alcanzada'),
            'state' => Yii::t('app', 'Estado'),
            'gateway_type' => Yii::t('app', 'Tipo de pasarela de pago'),
            'paypal_profile_id' => Yii::t('app', 'Paypal Profile ID'),
            'promo_code' => Yii::t('app', 'Código promocional'),
            'promo_used_months' => Yii::t('app', 'Meses usados de la promoción'),
            'non_payment' => Yii::t('app', 'Usuario en situación de impago'),
            'frozen' => Yii::t('app', 'Usuario congelado (Sólo puede ver)'),
            'non_payment_reminders' => Yii::t('app', '# Recordatorios de Impago'),
            
        ];
        
        /*
         * return [
            'id' => Yii::t('app', 'ID'),
            'current_plan' => Yii::t('app', 'Current Plan'),
            'user_id' => Yii::t('app', 'Usuario propietario'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'next_payment' => Yii::t('app', 'Next Payment'),
            'free' => Yii::t('app', 'Free'),
            'used_storage' => Yii::t('app', 'Used Storage'),
            'limit_storage' => Yii::t('app', 'Limit Storage'),
            'used_projects' => Yii::t('app', 'Used Projects'),
            'limit_projects' => Yii::t('app', 'Limit Projects'),
            'alert_80' => Yii::t('app', 'Alerta 80% alcanzada'),
            'alert_90' => Yii::t('app', 'Alerta 90% alcanzada'),
            'alert_100' => Yii::t('app', 'Alerta 100% alcanzada'),
            
        ];
         */
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
                   \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                   \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
               ],
               'value' => new \yii\db\Expression('NOW()'),
           ],
       ];
   } 
   
   /*
    * Returns true if the promo stored in this object exists, is open and available
    */
   public function promoIsActive() {
              
        $promo = \backend\modules\promos\models\PromoData::findOne(["code"=>$this->promo_code]);
       
        if($promo == null) {
           return false;
        }
        
        // Search for promo code
        if ( $this->promo_code == null || $this->promo_code == "" ) {
            return false;
        } else {
        
            $promoCode = \backend\modules\promos\models\PromoData::findOne(["code"=>$this->promo_code]);
            if($promoCode == null) {
                return false;
            } else  if ($promoCode->isAvailable() && ($this->promo_used_months <= $promoCode->discount_duration)) {
                return true;                
            } else if ( ($this->promo_used_months > 0) && ($this->promo_used_months <= $promoCode->discount_duration) ) {
                return true;
            } else {
                return false;
            }
        }        
    }
    
    
       /*
    * Returns true if the promo stored in this object exists, is open and available
    */
   public function promoIsActive4NextPeriod() {
              
        $promo = \backend\modules\promos\models\PromoData::findOne(["code"=>$this->promo_code]);
       
        if($promo == null) {
           return false;
        }
        
        // Search for promo code
        if ( $this->promo_code == null || $this->promo_code == "" ) {
            return false;
        } else {
        
            $promoCode = \backend\modules\promos\models\PromoData::findOne(["code"=>$this->promo_code]);
            if($promoCode == null) {
                return false;
            } else  if ($promoCode->isAvailable() && ($this->promo_used_months < $promoCode->discount_duration)) {
                return true;                
            } else if ( ($this->promo_used_months > 0) && ($this->promo_used_months < $promoCode->discount_duration) ) {
                return true;
            } else {
                return false;
            }
        }        
    }
   
    public function getCurrentPromoDiscount() {
        if($this->promoIsActive()) {
             $promoCode = \backend\modules\promos\models\PromoData::findOne(["code"=>$this->promo_code]);
             return $promoCode->client_discount;
        } else {
            return 0;
        }
    }
    
    public function getPercentUsedStorage() {

        if($this->limit_storage == 0)
            return 0;
        try {
            $percentaje = ( ($this->used_storage/1000000) *100) / $this->limit_storage/1000;
            return number_format($percentaje,1);
        } catch (Exception $ex) {
            return 0;
        }
    }
    
    
    public function getPercentUsedStorageByProject($project) {

        if($this->limit_storage == 0)
            return 0;
        try {
            $percentaje = ( ($project->used_storage/1000000) *100) / $this->limit_storage/1000;
            return number_format($percentaje,1);
        } catch (Exception $ex) {
            return 0;
        }
    }
    
    
    public function getPercentUsedProjects() {

        if($this->limit_projects == 0)
            return 0;
        try {
            $percentaje = ( ($this->used_projects) *100) / $this->limit_projects;
            return (int)$percentaje;
        } catch (Exception $ex) {
            return 0;
        }
        
    }

    /**
     * Devuelve el almacenamiento en la unidad necesaria de acuerdo al 
     * espacio utilizado. Hasta 100Mb devuevle Mb, A partir de ahí lo devuelve
     * en Gb.
     * 
     * @return int
     */
    public function getNormalizedUsedStorage() {
        return \common\utils\MyprojecttUtils::getNormalizedUsedStorage($this->used_storage);        
    }
    
    /**
     * Añade la cuenta de proyectos y guarda el modelo en bbdd
     */
    public function addProjectsCount() {
        $this->used_projects = $this->used_projects+1;
        $this->save();
        
        if($this->used_projects >= $this->limit_projects && $this->free == false) {
            \usersbackend\modules\explorer\models\AlertNumProjectsEvent::fire($this->user_id, $this->id);
        }
    }
    
    /**
     * Resta la cuenta de proyectos y guarda el modelo en bbdd
     */
    public function subsProjectsCount() {
        $this->used_projects = $this->used_projects-1;
        $this->save();
    }
    
    /**
     * Añade una cantidad de bytes usados de la cuenta
     */
    public function addStorageUse($bytes) {
        $this->used_storage = $this->used_storage+$bytes;
        $this->save();
        
        // Check used space alerts
        if($this->getPercentUsedStorage() >= 80) {
            if($this->alert_80 == false) {
                $this->alert_80 = true;
                $this->save();
                \usersbackend\modules\explorer\models\AlertSpace80Event::fire($this->user_id, $this->id);                
            } 
            
            if($this->getPercentUsedStorage() >= 90) {
                if($this->alert_90 == false) {
                    $this->alert_90 = true;
                    $this->save();
                    $user = User::findOne($this->user_id);
                    \usersbackend\modules\explorer\models\AlertSpace90Event::fire($this->user_id, $this->id);
                } 
            }
            
            if($this->getPercentUsedStorage() >= 100) {
                if($this->alert_100 == false) {
                    $this->alert_100 = true;
                    $this->save();
                    $user = User::findOne($this->user_id);
                    \usersbackend\modules\explorer\models\AlertSpace100Event::fire($this->user_id, $this->id);
                } 
            }
        }
    }
    
     /**
     * Resta una cantidad de bytes usados de la cuenta
     */
    public function subsStorageUse($bytes) {
        $this->used_storage = $this->used_storage-$bytes;
        
        
        if($this->alert_80 == true && $this->getPercentUsedStorage() < 80) {
            $this->alert_80 = false;
        }
        
        if($this->alert_90 == true && $this->getPercentUsedStorage() < 90) {
            $this->alert_90 = false;
        }
        
        if($this->alert_100 == true && $this->getPercentUsedStorage() < 100) {
            $this->alert_100 = false;
        }
        
        $this->save();
    }
    
    /**
     * Devuelve true si se han alcanzado el numero máximo de proyectos
     * @return boolean
     */
    public function projectsLimitReached() {
        if($this->used_projects>=$this->limit_projects) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * 
     * @return type
     */
    public function getPlanAdminName() {
        $plan = \backend\modules\planes\models\Plan::findOne($this->current_plan);
        if($plan != null) {
            return $plan->admin_name;
        }        
    }
    
    /**
     * Returns the string with used num projects
     * @return type
     */
    public function getUsedProjects() {
        $string = $this->used_projects;
        $string .= " ";
        $string .= ($this->used_projects==1)?Yii::t('app', 'proyecto'):Yii::t('app', 'proyectos');
        return $string;
    }
    
    /**
     * Returns true if there is enough space to upload a file with the specified space.
     * 
     * @param type $fileSize in bytes
     */
    public function availableSpace2Up($fileSize) {
        //var_dump(($this->used_storage + $fileSize));
        //var_dump(($this->limit_storage*1000000000));
        // Multiplico por 1.000.000.000 para pasar de Gb a Bytes
        // Multiplico por 1.05 para dar un 5 de margen de subida sobre el 100%
        if( ($this->used_storage + $fileSize) > ($this->limit_storage*1000000000*(1.05))) {
            return false;
        } else {
            return true;
        }
    }
    
    public function isFrozen() {
        return $this->frozen;
    }
        
}