<?php
namespace common\mail;

use Yii;

class MyMailAdmin extends MyMailMyProjectt {

    
    /**
     * 
     * @param type $nombreInvitado
     * @param type $emailInvitado
     * @param type $project
     */
    public static function send($asunto, $texto) {
        
        $from = parent::getInfoAddress();
        $to = parent::getInfoAddress();
        
        Yii::$app->mailer->compose('layouts/myprojecttAdminEmailTemplate', 
                                    ["content"=>$texto, "buttonUrl"=>"#"])
            ->setFrom($from)
            ->setTo($to)
            ->setSubject($asunto)
            ->send();
    }
    
}
?>

