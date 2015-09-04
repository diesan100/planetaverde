<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use \yii\db\BaseActiveRecord;
use yii\db\Expression;
use \common\models\Project;
use \backend\modules\settings\models\Settings;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $baja_definitiva_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property string $updated_at
 * @property string $password write-only password
 * @property string $telephone
* @property string $skype
* @property string $address
* @property string $province
* @property string $zip_code
* @property string $employment
* @property string $job_position
* @property string $birthday
* @property string $city
* @property string $studies
* @property string $professional_experience
* @property string $about_me
* @property string $picture_url
* @property string $company
* @property string $type
* @propery datetime $creation_date
* @property Membership $membership
* @property AccountSettings $account_settings
*/
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    public static $STATUS_ARRAY = [
        0=>"Deleted",
        10=>"Acive",        
    ];
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
           'timestamp' => [
               'class' => TimestampBehavior::className(),
               'attributes' => [
                   BaseActiveRecord::EVENT_BEFORE_INSERT => ['creation_date', 'updated_at'],
                   BaseActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
               ],
               'value' => new Expression('NOW()'),
           ],
       ];
        
        /*return [
            TimestampBehavior::className(),
        ];*/
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            /************************************/                       
           [['id', 'state', 'status'], 'integer'],
           [[/*'name', 'surname', */'email'], 'required'],
           [['creation_date', 'last_acces', 'birthday'], 'safe'],
           [['email'], 'string', 'max' => 150],
           [['name', 'surname', 'password', 'username', 'password_hash', 'password_reset_token', 'skype', 'address', 'province', 'employment', 'job_position', 'studies', 'picture_url' , 'company'], 'string', 'max' => 255],           
           [['username', 'email', 'name', 'surname', 'telephone', 'zip_code', 'city', 'professional_experience', 'about_me', 'address', 'job_position', 'company', 'studies', 'province', 'skype', 'employment'], 'filter', 'filter' => 'trim'],
           [['auth_key'], 'string', 'max' => 32],
           [['telephone'], 'string', 'max' => 20],
           [['zip_code'], 'string', 'max' => 30],
           [['city'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    
    /**
     * Generates new baja definitiva token
     */
    public function generateBajaDefinitivaToken()
    {
        $this->baja_definitiva_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
        /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'User Name'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'password' => Yii::t('app', 'Password'),
            'telephone' => Yii::t('app', 'Telephone'),

           'address' => Yii::t('app', 'Dirección'),
           'province' => Yii::t('app', 'Provincia'),
           'zip_code' => Yii::t('app', 'Código Postal'),
           'employment' => Yii::t('app', 'Profesión'),

           'birthday' => Yii::t('app', 'Fecha de nacimiento'),
           'studies' => Yii::t('app', 'Formación académica'),
           'picture_url' => Yii::t('app', 'Fotografía'),
            'creation_date' => Yii::t('app', 'Fecha de registro'),
            'last_acces' => Yii::t('app', 'Último acceso'),
            'updated_at' => Yii::t('app', 'Fecha de última actualización'),
            'city' => Yii::t('app', 'Ciudad'),          
        ];
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountSettings()
    {
        //return $this->hasOne(AccountSettings::className(), ['user_id' => 'id']);
        
        return AccountSettings::findOne(["user_id"=>$this->id]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembership()
    {
        return $this->hasOne(Membership::className(), ['user_id' => 'id']);
    }
    
    
    /**
     * Devuelve la cadena URL del directorio de dicho usuario.
     * Crea el directorio sino existe.
     * 
     */
    public static function getUserFolder($user_id){
        $uploadsAbsolutePath = \common\utils\MyprojecttUtils::getUploadsAbsoluteFile();
        $usersDirectory = $uploadsAbsolutePath . DIRECTORY_SEPARATOR . $user_id;
        if (!file_exists($usersDirectory)) {
            \yii\helpers\BaseFileHelper::createDirectory($usersDirectory);
        }
        return $usersDirectory;
    }
    
    /**
     * Returns user full name
     * @return type
     */
    public function getFullName() {
        if($this->name != null || $this->surname!=null) {
            return $this->name . " " . $this->surname;
        } else {
            return $this->email;
        }
    }
   
    /**
     * Update last acces to NOW
     */
    public function updateAccess() {
        $this->last_acces = new Expression("NOW()");
        $this->inactivo30 = false;
        $this->inactivo45 = false;
        $this->inactivo55 = false;
        $this->inactivo60 = false;
        $this->inactivo61 = false;
        $this->save();
    }
    
    /**
     * Delete this user from the system, 
     * including every object that makes reference to it
     */
    public function deleteUser() {
        
        // Notify admin
        \common\mail\MyMailAdmin::send("Borrando usuario", "Se procede al borrado (Baja definitiva) el usuario con nombre: '" . $this->getFullName() . "' y email '" . $this->email . "' en el sistema");
        
        // This is the user ID that is gonna replace this user ID in shared resources
        $defatulUserId = Settings::getParamValue("general", "default-user-id");
        
        // Deactivate user
        $this->status = User::STATUS_DELETED;            
        $this->state = User::STATUS_DELETED;          
        $this->save();

        // Delete projects
        $projects = Project::findAll(["owner"=>$this->id]);
        if($projects != null) {
            foreach ($projects as $project) {
                $project->deleteMe();
            }
        }

        /******* The user can have other objects in not owned projects *********/
        $invitations = \common\models\Invitation::findAll(["user_id"=>$this->id]);
        
        foreach ($invitations as $invitation) {
                \common\models\ObjectPermission::deleteAll(["invitation"=>$invitation->id]);
                $invitation->delete();
        }
        
        // Pending downloads
        \common\models\PendingDownloads::deleteAll(["user_id"=>$this->id]);
        
        // Files
        $ownedFiles = \common\models\File::findAll(["owner" => $this->id]);       
        foreach ($ownedFiles as $file) {
            $file->owner = $defatulUserId;
            $file->save();
        }
        
        // Revisions
        $ownedRevisions = \common\models\Revision::findAll(["owner" => $this->id]);       
        foreach ($ownedRevisions as $revision) {
            $revision->owner = $defatulUserId;
            $revision->save();
        }
        
        // Eventos
        $eventos = \common\models\MyEvent::getByUser($this->id);   
        
        foreach ($eventos as $event) {
            if($event->created_by == $this->id) {
                $event->created_by = $defatulUserId;
            }
            
            if($event->receiver_id == $this->id) {
                $event->receiver_id = $defatulUserId;
            }
            
            if($event->sender_id == $this->id) {
                $event->sender_id = $defatulUserId;
            }
            
            $event->save();
        }
        
        // Invoices
        $invoices = \backend\modules\billing\models\Invoice::findAll(["user_id" => $this->id]);       
        foreach ($invoices as $invoice) {
            $invoice->user_id = $defatulUserId;
            $invoice->save();
        }
        
        // Promos activity
        $promosActivity = \backend\modules\promos\models\PromosActivity::findAll(["user_id" => $this->id]);       
        foreach ($promosActivity as $activity) {
            $activity->user_id = $defatulUserId;
            $activity->save();
        }

        // Delete settings
        AccountSettings::deleteAll(["user_id"=>$this->id]);
        
        // Delete membership
        $this->membership->delete();
        
         // Gateway if it is needed
        if(!$this->membership->free) {
            // Dar de baja los pagos en la pasarela.
            if($this->membership->gateway_type == Membership::TYPE_GATEWAY_PAYPAL) {
                $paypalActions =  new PaypalFuncions();
                $paypalActions->ManageRecurringPaymentsProfileStatus(
                        $this->membership->paypal_profile_id, 
                        PaypalFuncions::ACTION_CANCEL);

                $this->membership->free = true;
            } else if($this->membership->gateway_type == Membership::TYPE_GATEWAY_REDSYS) {
                //TODO: Implementar
            }
        }
        
        // Finnaly delete user
        $this->delete();

        // Notfy Admin
        \common\mail\MyMailAdmin::send("Usuario borrado", "El usuario con nombre: '" . $this->getFullName() . "' y email '" . $this->email . "' ha sido correctamente eliminado del sistema");
        
    }
}
