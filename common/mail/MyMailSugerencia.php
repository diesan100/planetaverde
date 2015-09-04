<?php
namespace common\mail;

use Yii;

class MyMailSugerencia extends MyMailMyProjectt {

    /**
     * Envia un mensaje de sugerencia al administrador
     * @param type $user
     * @param type $comment
     */
    public static function sendSugerencia($user, $comment) {
        
        $content = "<p>" . 
                Yii::t("emails", "{nombre_remitente} (ID= {idUser}) ha enviado una sugerencia:", 
                            [   "nombre_remitente" =>$user->getFullName(),                                
                                "email"=>$user->email,
                                "idUser"=>$user->id])
                    . "</p>";
        
         $content .= "<p><i>" .
                 $comment
                 . "</i></p>";
                 
        $from = parent::getInfoAddress();
        $to = Yii::$app->params["adminEmail"];
        $subject = Yii::t("emails", "Sugerencia de {nombre_remitente}", ["nombre_remitente"=> $user->getFullName()]);
        $buttonUrl = Yii::getAlias("@frontend_web");
        
        Yii::$app->mailer->compose('layouts/myprojecttAdminEmailTemplate', 
                                    ["content"=>$content, "buttonUrl"=>$buttonUrl])
            ->setFrom($from)
            ->setTo($to)
            ->setSubject($subject)
            ->send();
        
        return true;
    }
    
    
    
    

    
    
}
?>

