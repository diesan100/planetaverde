<?php
namespace usersbackend\modules\users\models;

use Yii;


/**
 * User model
 *
 * @property integer $user_id
 * @property string $email
 * @property string $password
 * @property string $old_password
 * @property string $password_repeat
 */
class UpdatePasswordForm extends \yii\base\Model
{

    public $user_id;
    public $email;
    public $password;
    public $old_password;
    public $password_repeat;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [   
            [['email'], 'email'], 
            [['email'], 'string', 'max' => 150],      
            [['password', 'password_repeat', 'old_password'], 'required'],
            ['password', 'string', 'min' => 6],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password'],
            [['password'],'safe'],
            [['password'], 'canLogin'],
        ];
    }
    
    /**
     * Check the old password is corret
     */
    public function canLogin() {

        if (!Yii::$app->user->identity->validatePassword($this->old_password)) {
            $this->addError("old_password", Yii::t('app', "El password introducido no es correcto"));
        }
        
    }
    
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Nombre de usuario'),
            'name' => Yii::t('app', 'Nombre'),
            'surname' => Yii::t('app', 'Apellidos'),
            'old_password' => Yii::t('app', 'Contraseña actual'),
            'password' => Yii::t('app', 'Nueva contraseña'),
            'password_repeat' => Yii::t('app', 'Repetir nueva contraseña'),
            
        ];
    }
    
   
}
