<?php
namespace common\mail;

use Yii;

class MyMailCuentaselo extends MyMailMyProjectt {

    /**
     * Envia un mensaje de cuentaselo a la persona indicada y al administrador
     * @param type $email
     * @param type $comment
     */
    public static function sendCuentaselo($name, $email, $comment) {
        
        // 
        MyMailCuentaselo::send2Amigo($name, $email, $comment);
        
        MyMailCuentaselo::send2User(Yii::$app->user->identity->getFullName(), Yii::$app->user->identity->email);
        
        MyMailCuentaselo::send2Admin(Yii::$app->user->identity, $name, $email);
        
        return true;
    }
    
    
    /**
     * Notifica al usuario que recibe el mensaje.
     * 
     * @param type $name
     * @param type $email
     * @param type $comment
     */
    

    private static function send2Amigo($name, $email, $comment) {
        $content = "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Hola {nombre_destinatario}:  ", ["nombre_destinatario" =>$name])
                    . "</p>";
        
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "PruebaMyprojectt, podrás compartir tus proyectos en la nube y tener control "
                . "total de cual de tus invitados está al día de las últimas revisiones y quien no. ") .
                "</p>";
        
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Es genial. Además para que lo pruebes, te ofrecen una cuenta gratuita para que "
                . "la uses el tiempo que quieras. El registro es muy rápido y la aplicación "
                . "es muy sencilla de utilizar. Te la recomiendo.") .
                        "</p>";
                
        
        $from = parent::getInfoAddress();
        $to = $email;
        $subject = Yii::t("emails", "Prueba Myprojectt, te gustará");
        $buttonUrl = Yii::getAlias("@frontend_web");
        
        Yii::$app->mailer->compose('layouts/myprojecttEmailTemplate', 
                                    ["content"=>$content, "buttonUrl"=>$buttonUrl])
            ->setFrom($from)
            ->setTo($to)
            ->setSubject($subject)
            ->send();
    }
    
    /**
     * Notifica al usuario que ha realizado la sugerencia
     * 
     * @param type $name
     * @param type $email
     * @param type $comment
     */
    private static function send2User($name, $email) {
        
        $content = "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Hola {nombre_destinatario}: ", ["nombre_destinatario" => $name]) .
                "</p>";
            
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Gracias por recomendar Myprojectt a tus amigos. ") .
                "</p>";
                
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Es un orgullo para nosotros que nuestra aplicación sea de tu agrado. ") .
                "</p>";
                
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Te recordamos que si echas en falta alguna función o crees que se puede mejorar alguna de las existentes, tus sugerencias son muy bien recibidas.") .
                "</p>";
                
                
        $from = parent::getInfoAddress();
        $to = $email;
        $subject = Yii::t("emails", "Gracias por recomendar Myprojectt");
        $buttonUrl = Yii::getAlias("@usersbackend_web");
        
        Yii::$app->mailer->compose('layouts/myprojecttEmailTemplate', 
                                    ["content"=>$content, "buttonUrl"=>$buttonUrl])
            ->setFrom($from)
            ->setTo($to)
            ->setSubject($subject)
            ->send();
    }
    
    /**
     * Notifica al administrador.
     * @param type $nameUser
     * @param type $nameAmigo
     */
    private static function send2Admin($user, $nameAmigo, $email) {
        
        $content = "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "{nombre_remitente} (ID= {idUser}) ha recomendado Myprojectt a {nombre_destinatario} (email: {email})", 
                            [   "nombre_remitente" =>$user->getFullName(), 
                                "nombre_destinatario" =>$nameAmigo,
                                "email"=>$email,
                                "idUser"=>$user->id])
                    . "</p>";
        
        $from = parent::getInfoAddress();
        $to = Yii::$app->params["adminEmail"];
        $subject = Yii::t("emails", "Recomendación de {nombre_remitente}", ["nombre_remitente"=> $user->getFullName()]);
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

