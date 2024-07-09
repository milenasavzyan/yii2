<?php

namespace app\modules\admin\controllers;

use app\models\Category;
use app\models\Orders;
use app\models\Product;

class MainController extends AppAdminController
{
    public function actionIndex()
    {
        $orders = Orders::find()->count();
        $products = Product::find()->count();
        $categories = Category::find()->count();
        return $this->render('index', compact('orders', 'products', 'categories'));
    }
    public function actionTest()
    {
        return $this->render('test');
    }

}