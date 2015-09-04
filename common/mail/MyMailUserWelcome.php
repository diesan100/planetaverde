<?php
namespace common\mail;

use Yii;

class MyMailUserWelcome extends MyMailMyProjectt {

    /**
     * MAIL-BIENVENIDA
     * 
     * Envia un mensaje de bienvenida a Myprojectt
     * 
     * @param type $name
     * @param type $plan
     */
    public static function sendWelcomeMsg() {
                
        // El usuario acaba de registrarse y logarse automátcamente así que podemos coger los datos de la sesión        
        $planName = Yii::$app->user->identity->membership->getPlanAdminName();
                
        MyMailUserWelcome::send2User(Yii::$app->user->identity->getFullName(), Yii::$app->user->identity->email);
        
        MyMailUserWelcome::send2Admin(Yii::$app->user->identity->getFullName(), Yii::$app->user->identity->email, $planName);
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
                Yii::t("emails", "Bienvenido My Myprojectt !!!") .
                "</p>";
        
        $content .= "<p>&nbsp;</p>";
        
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Comparte tus proyectos en la nube de manera fácil e intuitiva. No te preocupes por nada, te guiaremos en todo el proceso.") .
                "</p>";
       $content .= "<p>&nbsp;</p>";
       
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Una vez hayas creado tus proyectos podrás agregar usuarios con los que compartir tus documentos. ") .
                "</p>";
        
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Los usuarios pueden ser de dos tipos; los integrantes de tu equipo y los invitados.") .
                "</p>";
        
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Los integrantes de tu equipo tendrán acceso a todas las carpetas del proyecto, mientras que los invitados solo tendrán acceso a las carpetas concretas que hayas compartido con ellos.") .
                "</p>";
        
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Tú eliges quién puede editar en tu proyecto y quien puede ver únicamente.") .
                "</p>";
        
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Cada vez que subas un archivo o la revisión de uno existentes, todos los usuarios recibirán una correo de aviso. De esta manera, todos trabajaréis con la última revisión de la documentación.") .
                "</p>";
        
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Desde la zona de “Descargas” podrás controlar y avisar fácilmente a los usuarios que aún tengan revisiones de archivos pendientes de descargar.") .
                "</p>";
        
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Nuestro principal objetivo es que todos los usuarios de tu proyecto trabajéis con la última revisión de los documentos y que para ti sea muy fácil gestionarlo.") .
                "</p>";
       
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Bienvenido nuevamente a Myproyectt y no dudes en ponerte en contacto con nuestro departamento técnico para cualquier duda o aclaración.") .
                "</p>";     
          
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Pedro López") .
                "</p>";
        
        $content .= "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Director General") .
                "</p>";

        $from = parent::getInfoAddress();
        //$from = Yii::$app->params["infoEmail"];
        $to = $email;
        $subject = Yii::t("emails", "Bienvenido a My Myprojectt");
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
    private static function send2Admin($nameUser, $email, $planName) {
        
        $content = "<p style='text-align: left; color: #231f20;;font-family: Arial, Helvetica, sans-serif;font-size: 16px;'>" . 
                Yii::t("emails", "Nuevo usuario con email '{email}' se ha registrado en Myprojectt con el plan '{nombre_plan}'", 
                            [   "nombre_usuario" =>$nameUser, 
                                "email" =>$email,
                                "nombre_plan"=>$planName])
                    . "</p>";
        
        $from = parent::getInfoAddress();
        $to = parent::getAdminAddress();
        $subject = Yii::t("emails", "Registro de nuevo usuario ({email})", ["email"=> $email]);
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

