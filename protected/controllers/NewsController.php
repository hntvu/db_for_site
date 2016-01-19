<?php

class NewsController extends Controller {

    /**
     * Lists all models.
     */
    public function actionIndex($controller, $alias = NULL) {
        if ($alias != NULL) {
            $model = new News();
            $criteria = new CDbCriteria();
            $criteria->join = 'INNER JOIN menu c ON c.id = t.idmenu';
            $criteria->condition = 'c.alias="' . $alias . '"' . ' AND c.controller ="' . $controller . '"';
            $criteria->order = 'datecreate DESC';
            $dataProvider = new CActiveDataProvider('News', array(
                'criteria' => $criteria,
                'pagination' => array(
                    'pageSize' => 3,
                )
            ));
            $model = $dataProvider->getData();
            $this->render('index', array(
                'dataProvider' => $dataProvider,
                'model' => $model,
            ));
        }
    }

    public function actionDetail($alias = NULL) {
        if ($alias != NULL) {
            $split = explode('-', $alias);
            (int) $numNews = substr(end($split), 5);
            $criteria = new CDbCriteria();
            $criteria->condition = 't.id="' . $numNews . '"';
            $model = News::model()->find($criteria);
            if ($model === NULL)
                throw new CHttpException(404, 'Trang bạn yêu cầu không tồn tại');

            //cac tin khac de hien thi phan tin tuc
            $detail_more = new CDbCriteria();
            $detail_more->order = 'id DESC';
            $detail_more_num = $model->id;
            $detail_more->condition = ('id NOT IN (' . $detail_more_num . ') AND idmenu=' . $model->idmenu);
            $dataProviderMore = new CActiveDataProvider('News', array(
                'criteria' => $detail_more,
                'pagination' => array(
                    'pageSize' => 4,
                )
            ));

            $this->render('detail', array(
                'model' => $model,
                'dataProviderMore' => $dataProviderMore,
            ));
        }
    }

}
