<?php

class SlideshowWidget extends CWidget {

    public function run() {
        $model = Slideshow::model()->findAll();
        $this->render('slideshow', array(
            'model' => $model,
        ));
    }

}