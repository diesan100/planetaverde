<?php
namespace frontend\models;

use common\models\User;
use yii\base\InvalidParamException;
use yii\base\Model;
use Yii;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;
    public $password_repeat;

    /**
     * @var \usersbackend\modules\users\models\User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param  string                          $token
     * @param  array                           $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new \yii\web\HttpException(403, "Forbidden");
        }
        $this->_user = User::findByPasswordResetToken($token);
        if (!$this->_user) {
            throw new \yii\web\HttpException(403, "Forbidden");
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            [['password'],'safe'],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password'],            
        ];
    }

    /**
     * Resets password.
     *
     * @return boolean if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        //$user->password = $this->password;
        $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        $user->removePasswordResetToken();

        return $user->save();
    }
    
    public function attributeLabels() {
        return [
            'password' => Yii::t('app', 'Contraseña'),
            'password_repeat' => Yii::t('app', 'Repetir contraseña'),            
        ];
    }
    
}
