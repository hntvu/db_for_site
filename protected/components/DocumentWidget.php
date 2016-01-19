<?php

class DocumentWidget extends CWidget {

    public function run() {
        $model = Document::model()->findAll('id != 0 LIMIT 10');
        $this->render('document', array(
            'model' => $model,
        ));
    }

}
