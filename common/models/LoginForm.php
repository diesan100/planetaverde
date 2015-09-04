<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        //$logger =         \common\utils\MyLogger::getInstance("login.log");
        //$logger->logInfo("validatePassword");
        //$logger->logInfo($this->hasErrors());
        //$logger->logInfo($this->password);
        //$logger->logInfo($this->username);
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            //$logger->logInfo($user);
            if (!$user || !$user->validatePassword($this->password)) {
                //$logger->logInfo("password no validado");
                $this->addError($attribute, Yii::t("app", 'Los datos introducidos no son correctos.'));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        var_dump("11");
        if(Yii::$app->id == "planetaverde-app-backend") {
            // USERS BACKEND, COMENTADO PARA QUE EL ADMINISTRADOR PUEDA ENTRAR
            if ($this->validate() /*&& $this->getUser()->type == 1*/) {
                return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
            } else {
                return false;
            }
        } else {
            if ($this->validate() && $this->getUser()->type == 2) {
                return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
            } else {
                return false;
            }
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = \common\models\User::findByUsername($this->username);
        }

        return $this->_user;
    }
    
       /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'User name'),
            'password' => Yii::t('app', 'Password'),
            'rememberMe' => Yii::t('app', 'Remember me'),
            
        ];
    }
}
