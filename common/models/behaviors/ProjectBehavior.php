<?php
namespace common\models\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use common\models\MyEventSearch;
use \yii\helpers\FileHelper;
use usersbackend\modules\users\models\Membership;
use common\models\File;
use \common\models\Revision;
use common\models\Invitation;
use common\models\Download;

/**
 * Description of ProjectBehavior
 *
 * @author Diego
 */
class ProjectBehavior extends Behavior {
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_DELETE => 'afterDelete',
        ];
    }
    
    public function afterDelete($event) 
    {   
        $project = $event->sender;
        /**** DELETE DEPENDING MODEL OBJECTS ****/
        // Delete events
        MyEventSearch::deleteAll(["source_object_id"=>$project->id]);
        MyEventSearch::deleteAll(["target_object_id"=>$project->id]);
        MyEventSearch::deleteAll(["project_id"=>$project->id]);
        
        // TODO: Clean up files, FILES, FOLDERS, PERMISSIONS, DOWNLOADS, INVITATIONS, PROJECT_RELATIONS
        Revision::deleteAll(["project"=>$project->id]);
        File::deleteAll(["project"=>$project->id]);
        \common\models\Invitation::deleteAll(["project"=>$project->id]);
        \common\models\Download::deleteAll(["project"=>$project->id]);
        // Event??
        
        // Delete all project files depending on the project, including its folder itself
        FileHelper::removeDirectory($project->getProjectAbsolutePath());
        
        
        /***** UPDATE MEMBERSHIP ******/
        //TODO: Update used storage
        $membership = Membership::findOne(["user_id" => $project->owner]);
        $membership->subsStorageUse($project->used_storage);
        $membership->subsProjectsCount();
        
    }
}
