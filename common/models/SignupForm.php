<?php
namespace common\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    
    public $name;
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            ['username', 'filter', 'filter' => 'trim'],
            [['name' , 'surname', 'email'], 'required', 'on' => 'signup'],            
            ['username', 'unique', 'targetClass' => '\usersbackend\modules\users\models\User', 'message' => Yii::t('app', 'This user name is not available.')],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('app', 'This email address is not available.')],
            [['email','password', 'password_repeat'], 'required'],
            ['password', 'string', 'min' => 6],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password'],
            [['password'],'safe'],
        ];
    }
    
     /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            
            $user->type = 1;
            $user->name = $this->name;
            //$user->surname = $this->surname;           
            $user->name = $this->name;
            $user->state = User::STATUS_ACTIVE;
            
            $user->username = $this->email;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                
                return $user;
            }
        }

        return null;
    }
    
    
     /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'User name'),
            'mail' => Yii::t('app', 'e-mail'),
            'password' => Yii::t('app', 'Password'),
            'password_repeat' => Yii::t('app', 'Repeat password'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
        ];
    }
}
