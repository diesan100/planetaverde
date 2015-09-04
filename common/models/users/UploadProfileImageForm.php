<?php

namespace common\models\users;
use \yii\base\Model;
/**
 * UploadProfileImageForm allows uploads of profile images.
 *
 * Profile images will used by spaces or users.
 *
 * @package humhub.forms
 * @since 0.5
 */
class UploadProfileImageForm extends Model {

    /**
     * @var UploadedFile|Null file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file'],
        ];
    }

}
