<?php

class DocumentController extends Controller {

    public function actionIndex($alias = NULL) {
        if ($alias != NULL) {
            $cdbDocument = new CDbCriteria();
            $cdbDocument->condition = ('alias = "' . $alias . '"');
            $modelDocument = Document::model()->find($cdbDocument);
            if ($modelDocument === NULL)
                throw new CHttpException(404, 'Trang bạn yêu cầu không tồn tại');

            //cac tin khac de hien thi phan tin tuc
            $detail_more = new CDbCriteria();
            $detail_more->order = 'id DESC';
            $detail_more_num = $modelDocument->id;
            $detail_more->condition = ('id NOT IN (' . $detail_more_num . ') ');
            $dataProviderMore = new CActiveDataProvider('Document', array(
                'criteria' => $detail_more,
                'pagination' => array(
                    'pageSize' => 4,
                )
            ));
            $this->render('detail', array(
                'model' => $modelDocument,
                'dataProviderMore' => $dataProviderMore,
            ));
        } else {
            $dataProvider = new CActiveDataProvider('Document', array(
                'criteria' => array(
                    'order' => 'datecreate DESC',
                ),
                'pagination' => array(
                    'pageSize' => 3,
                )
            ));
            $this->render('index', array(
                'dataProvider' => $dataProvider,
            ));
        }
    }

}
