<?php
namespace common\mail;

use Yii;
use yii\helpers\Html;

class MyMailUserBajaRequest extends MyMailMyProjectt {

    /**
     * MAIL-CONFIRM-BAJA
     * 
     * Envia un mensaje para que el usuario confirme su baja en el sistema.
     * 
     */
    public static function sendConfirmationRequest($user) {
                
        $bajaLink = Yii::$app->urlManager->createAbsoluteUrl(['site/baja-definitiva', 'token' => $user->baja_definitiva_token]);
        
        $content = "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Hola {nombre_destinatario}: ", ["nombre_destinatario" => $user->getFullName()]) .
                "</p>";
            
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Hemos recibido una petición en tu nombre para darte de baja en el servicio de MyProjectt.") .
                "</p>";
        
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Para completar el proceso de baja, haz click en el siguiente enlace, o bien, cópialo y pégalo en tu navegador favorito.").
                "</p>";
        
         $content .= Html::a(Html::encode($bajaLink), $bajaLink);

        $from = parent::getInfoAddress();
        $to = $user->email;
        $subject = Yii::t("emails", "Confirmación baja de MyProjectt");
        $buttonUrl = $bajaLink;
        
        Yii::$app->mailer->compose('layouts/myprojecttEmailTemplate', 
                                    ["content"=>$content, "buttonUrl"=>$buttonUrl])
            ->setFrom($from)
            ->setTo($to)
            ->setSubject($subject)
            ->send();
        
        return true;
    }
    
    
    /**
     * MAIL-BAJA-CONFIRMADA
     * 
     * Envia un mensaje confirmando que el usuario ha sido de baja.
     * 
     */
    public static function sendConfirmationAccepted($user) {
        
        $content = "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Hola {nombre_destinatario}: ", ["nombre_destinatario" => $user->getFullName()]) .
                "</p>";
          
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Tu cuenta ha sido dada de baja según tu solicitud.") .
                "</p>";
        
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Te agradecemos el tiempo que has utilizado Myprojecttt y te animamos a que vuelvas con nosotros cuando lo necesites para seguir compartiendo tus proyectos en la nube.") .
                "</p>";
        
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Aprovechamos para recordarte que disponemos de una cuenta básica con la que utilizar Myprojectt gratuitamente.") .
                "</p>";
        
        $from = parent::getInfoAddress();
        $to = $user->email;
        $subject = Yii::t("emails", "La baja ha sido realizada");
        $buttonUrl = \yii\helpers\Url::to("@frontend_web");
        
        Yii::$app->mailer->compose('layouts/myprojecttEmailTemplate', 
                                    ["content"=>$content, "buttonUrl"=>$buttonUrl])
            ->setFrom($from)
            ->setTo($to)
            ->setSubject($subject)
            ->send();
        
        
        MyMailUserBajaRequest::notifyBaja2Admin($user);
        
        return true;
    }
    
    /**
     * Notificamos al administrador de la baja del usuario
     * @param type $user
     */
    public static function notifyBaja2Admin($user) {
        
        $content = "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "'{nombre_usuario}', con email '{email}' se ha dado de baja definitiva en Myprojectt", 
                            [   "nombre_usuario" =>$user->getFullName(), 
                                "email" =>$user->email])
                    . "</p>";
        
        $from = parent::getInfoAddress();
        $to = Yii::$app->params["adminEmail"];
        $subject = Yii::t("emails", "Baja de usuario ({email})", ["email"=> $user->email]);
        $buttonUrl = Yii::getAlias("@frontend_web");
        
        Yii::$app->mailer->compose('layouts/myprojecttAdminEmailTemplate', 
                                    ["content"=>$content, "buttonUrl"=>$buttonUrl])
            ->setFrom($from)
            ->setTo($to)
            ->setSubject($subject)
            ->send();
    }
    
}
?>

