<?php
namespace common\mail;

use Yii;

class MyMailTest extends MyMailMyProjectt {

    
    /**
     * 
     * @param type $nombreInvitado
     * @param type $emailInvitado
     * @param type $project
     */
    public static function send($asunto, $texto) {
        
       
            
        $content =$texto;
         
        $subject = $asunto;
        
        $from = parent::getInfoAddress();
        $to = "diego.sanz@gmail.com";
        
        $buttonUrl = Yii::getAlias("@frontend_web");
        
        return Yii::$app->mailer->compose('layouts/myprojecttEmailTemplate', 
                                    ["content"=>$content, "buttonUrl"=>$buttonUrl])
            ->setFrom($from)
            ->setTo($to)
            ->setSubject($subject)
            ->send();
    }
    
}
?>

