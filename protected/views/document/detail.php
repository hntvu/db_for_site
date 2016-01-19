<!--_____________________ BEGIN CONTENT GT _____________________-->
<div class="row">
    <div class="col-lg-12" id="content-gt">
        <hr class="hr-primary"/>
        <?php
        if (isset($this->breadcrumbs)) {
            $this->widget('zii.widgets.CBreadcrumbs', array(
                'htmlOptions' => array('class' => 'breadcrumb bread-primary'),
                'separator' => '<span style="color:#0099FF;"> <i class="fa fa-caret-right"></i> </span>',
                'tagName' => 'ol',
                'homeLink' => '<li><a href="' . Yii::app()->homeUrl . '"><i class="fa fa-home" style="font-size:1.5em; color:#FF6600;"></i></a></li>',
                'links' => array(
                    'Văn bản' => array('document/index'),
                    $model->title,
                ),
            ));
        }
        ?>
        <hr class="hr-primary" style="margin-top: 5px;"/>
    </div>                        
</div> 

<div class="row">
    <div class="col-lg-12 content-news text-justify">
        <p class="views-news"><i class="fa fa-calendar"></i> <?= Yii::app()->dateFormatter->format('dd/MM/y H:mm', strtotime($model->datecreate)) ?> <i class="fa fa-eye"></i> <?= $model->views; ?></p>
        <h4><a href=""><?= $model->title; ?></a></h4>                            
        <p class="lead" style="font-size: 1.3em; font-weight: bold;"><?= $model->summary; ?></p>
        <p class=""><?= $model->content; ?></p>
        <p class="pull-right text-info sourceNews"><strong><a href=""><?= $model->source; ?></a></strong></p>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel-heading-sub">
            <h5><a><strong>+ Thông tin khác</strong></a></h5>
        </div>

        <ul class="sub-list-news text-justify">
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dataProviderMore,
                'itemView' => '_viewDetailMore',
                'summaryText' => FALSE,
                //'template' => '{pager}{items}',
                'pager' => array(
                    'class' => 'CLinkPager',
                    'header' => '',
                    'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
                    'nextPageLabel' => '<i class="fa fa-angle-right"></i>',
                    'firstPageLabel' => '<i class="fa fa-angle-double-left"></i>',
                    'lastPageLabel' => '<i class="fa fa-angle-double-right"></i>',
                    'maxButtonCount' => 5, // defalut 10  
                    // css class         
                    'firstPageCssClass' => '', //default "first"
                    'lastPageCssClass' => '', //default "last"
                    'previousPageCssClass' => '', //default "previours"
                    'nextPageCssClass' => '', //default "next"
                    'internalPageCssClass' => '', //default "page"
                    'selectedPageCssClass' => 'select_page', //default "selected"
                    'hiddenPageCssClass' => 'hidden_page', //default "hidden" 
                    'htmlOptions' => array(
                        'class' => '',
                        'style' => '',
                        'id' => ''
                    ),
                ),
            ));
            ?>
        </ul>
    </div>
</div>