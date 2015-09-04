<?php

namespace common\modules\media\models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyUploadedFile
 *
 * @author Diego
 */
class MyUploadedFile extends \yii\web\UploadedFile {
    public $id;
    public $url;
}
