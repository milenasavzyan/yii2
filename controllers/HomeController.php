<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\Product;

class HomeController extends AppController
{
    public function actionIndex()
    {
        $offers = Product::find()->all();
        return $this->render('index', compact('offers'));
    }

}