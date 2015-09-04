<?php
use yii\helpers\Url;
?>
<li <?= (Yii::$app->controller->id === "site")? "class='active open'": ""; ?>>
    <a href="<?=Url::to(['//cms/site/index'])?>"><i class="fa fa-home"></i> <span
							class="title"> Start </span></a></li>
<!-- IMAGES REPOSITORY -->
<li <?= (Yii::$app->controller->id === "media-manager")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-file-image-o"></i> <span
            class="title"> Media library </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li <?= (Yii::$app->controller->action->id === "index")? "class='active'": ""; ?>>
                <!--<a href="/myprojectt/backend/web/index.php?r=media-manager%2Findex">-->
                <a href="<?=Url::to(['//media/media-manager/index'])?>"> 
                    <span class="title"> Images </span>
                </a>
        </li>
        <li <?= (Yii::$app->controller->action->id === "create")? "class='active'": ""; ?>>
                <a href="<?=Url::to(['//media/media-manager/create'])?>">
                        <span class="title"> New Image </span>
                </a>
        </li>
    </ul>
</li>

<li <?= (Yii::$app->controller->id === "cms-post-content")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-pencil-square-o"></i>
            <span class="title"> Posts </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
            <li <?= ((Yii::$app->controller->action->id === "index")||(Yii::$app->controller->action->id === "update"))? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//cms/cms-post-content/index'])?>">
                            <span class="title"> Posts </span>
                    </a>
            </li>
            <li <?= (Yii::$app->controller->action->id === "create")? "class='active'": ""; ?>>
                    <a href="<?=Url::to(['//cms/cms-post-content/create'])?>">
                            <span class="title"> New Post </span>
                    </a>
            </li>
    </ul>
</li>


<li <?= (Yii::$app->controller->id === "cms-category")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-tags"></i> <span
            class="title"> Categories </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li <?= (Yii::$app->controller->action->id === "index")? "class='active'": ""; ?>>
                <a href="<?=Url::to(['//cms/cms-category/index'])?>"> <span
                        class="title"> Categories </span>
        </a></li>
        <li <?= (Yii::$app->controller->action->id === "create")? "class='active'": ""; ?>>
                <a href="<?=Url::to(['//cms/cms-category/create'])?>"> <span
                        class="title"> New Category </span>
        </a></li>
    </ul>
</li>

<!--
<li <?= (Yii::$app->controller->id === "cms-user")? "class='active open'": ""; ?>>
        <a href="javascript:void(0)"><i class="fa fa-user"></i> <span
                class="title"> Users </span><i class="icon-arrow"></i> </a>
        <ul class="sub-menu">
                <li <?= (Yii::$app->controller->action->id === "index")? "class='active'": ""; ?>>
                        <a href="<?=Url::to(['//cms/cms-user/index'])?>">
                                <span class="title"> Users </span>
                </a></li>
                <li <?= (Yii::$app->controller->action->id === "create")? "class='active'": ""; ?>>
                        <a href="<?=Url::to(['//cms/cms-user/index'])?>">
                                <span class="title"> New User </span>
                </a></li>
        </ul>
</li>
-->
<li <?= (Yii::$app->controller->id === "cms-page")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-laptop"></i> <span
            class="title"> Site Pages </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li <?= (Yii::$app->controller->action->id === "index")? "class='active'": ""; ?>>
            <a href="<?=Url::to(['//cms/cms-page/index'])?>">
                    <span class="title"> Pages </span>
            </a>
        </li>
        <li <?= (Yii::$app->controller->action->id === "create")? "class='active'": ""; ?>>
            <a href="<?=Url::to(['//cms/cms-page/create'])?>">
                    <span class="title"> New Page </span>
            </a>
        </li>
    </ul>
</li>

<li <?= ((Yii::$app->controller->id === "cms-menu") || ((Yii::$app->controller->id === "cms-menu-item")))? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-sitemap"></i> <span
            class="title"> Menu &amp; Menu Items </span><i class="icon-arrow"></i>
    </a>
    <ul class="sub-menu">
        <li <?= ((Yii::$app->controller->action->id === "index") && (Yii::$app->controller->id === "cms-menu"))? "class='active'": ""; ?>>
                <a href="<?=Url::to(['//cms/cms-menu/show'])?>">
                <span class="title"> Menus </span>
        </a></li>
        <li <?= ((Yii::$app->controller->action->id === "create") && (Yii::$app->controller->id === "cms-menu"))? "class='active'": ""; ?>>
                <a href="<?=Url::to(['//cms/cms-menu/create'])?>">
                <span class="title"> New Menu </span>
                <span class="label label-inverse pull-right small">DEPRECATED</span>
        </a></li>

        <li <?= ((Yii::$app->controller->action->id === "index") && (Yii::$app->controller->id === "cms-menu-item"))? "class='active'": ""; ?>>
                <a href="<?=Url::to(['//cms/cms-menu-item/index'])?>">
                <span class="title"> Menu Items </span>
                <span class="label label-inverse pull-right small">DEPRECATED</span>
        </a></li>
        <li <?= ((Yii::$app->controller->action->id === "create") && (Yii::$app->controller->id === "cms-menu-item"))? "class='active'": ""; ?>>
                <a href="<?=Url::to(['//cms/cms-menu-item/create'])?>">
                <span class="title"> New Menu Item </span>
                <span class="label label-inverse pull-right small">DEPRECATED</span>
        </a></li>
    </ul>
</li>

<!-- WIDGETS -->
<li <?= (Yii::$app->controller->id === "cms-widget-position")? "class='active open'": ""; ?>>
    <a href="javascript:void(0)"><i class="fa fa-tasks"></i> <span
            class="title"> Site Widgets </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li <?= (Yii::$app->controller->action->id === "index")? "class='active'": ""; ?>>
            <a href="<?=Url::to(['//cms/cms-widget-position/index'])?>">
                    <span class="title"> Widget Positions </span>
            </a>
        </li>
        <li <?= (Yii::$app->controller->action->id === "create")? "class='active'": ""; ?>>
            <a href="<?=Url::to(['//cms/cms-widget-position/create'])?>">
                    <span class="title"> New Widget Positions </span>
            </a>
        </li>
    </ul>
</li>




<li <?= ((Yii::$app->controller->id === "cms-layout") || ((Yii::$app->controller->id === "cms-layout-section")))? "class='active open'": ""; ?>>
        <a href="javascript:void(0)"><i class="fa fa-qrcode"></i> <span class="title"> Layout Settings </span><span class="label label-inverse small">ADVANCED</span><i class="icon-arrow"></i> </a>
        <ul class="sub-menu">
                <li>
                        <a href="<?=Url::to(['//cms/cms-layout/index'])?>">
                                <span class="title"> Layouts </span>
                        </a>
                </li>
                <li>
                        <a href="<?=Url::to(['//cms/cms-layout/create'])?>"> <span
                                class="title"> New Layout </span>
                        </a>
                </li>
                <li>
                        <a href="<?=Url::to(['//cms/cms-layout-section/index'])?>">
                                <span class="title"> Layout sections </span>
                        </a>
                </li>
                <li>
                        <a href="<?=Url::to(['//cms/cms-layout-section/create'])?>"> <span
                                class="title"> New Layout section </span>
                        </a>
                </li>
        </ul>
</li>
