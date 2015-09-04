<?php
namespace common\mail;

use Yii;
use yii\helpers\Html;

class MyMailUserResetPassword extends MyMailMyProjectt {

    /**
     * MAIL-RECORDAR-PASSWORD
     * 
     * Envia un mensaje para resetear la contraseña del usuario.
     * 
     */
    public static function sendToken($user) {
        
        $resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);

        
        $content = "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Hola {nombre_destinatario}: ", ["nombre_destinatario" => $user->getFullName()]) .
                "</p>";
            
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Hemos recibido una petición en tu nombre para resetear tu contraseña de acceso a MyProjectt.") .
                "</p>";
        
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Para completar el proceso, haz click en el siguiente enlace, o bien cópialo y pégalo en tu navegador.") .
                "</p>";
        
         $content .= Html::a(Html::encode($resetLink), $resetLink);

        $from = parent::getInfoAddress();
        $to = $user->email;
        $subject = Yii::t("emails", "Contraseña olvidada");
        $buttonUrl = $resetLink;
        
        Yii::$app->mailer->compose('layouts/myprojecttEmailTemplate', 
                                    ["content"=>$content, "buttonUrl"=>$buttonUrl])
            ->setFrom($from)
            ->setTo($to)
            ->setSubject($subject)
            ->send();
        
        return true;
    }
    
    
}
?>

