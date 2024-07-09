<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Product;
use yii\web\NotFoundHttpException;

class ProductController extends AppController
{
    public function actionIndex()
    {

    }
    public function actionView($id)
    {
        $offer = Product::findOne($id);

        if (!$offer) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        $this->setMeta("{$offer->title} ::" .  \Yii::$app->name . " - {$offer->description}");

        return $this->render('view', [
            'offer' => $offer,
        ]);
    }


}