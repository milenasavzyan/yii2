<?php

namespace app\controllers;


use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{
    public function actionView($id)
    {
        $category = Category::findOne($id);

        if (!$category) {
            throw new NotFoundHttpException('Not found');
        }

        $this->setMeta($category->title);

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 1, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();


        return $this->render('view', [
            'category' => $category,
            'products' => $products,
            'pages' => $pages,
        ]);
    }


    public function actionSearch()
    {
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta("Search result for: {$q} :: " . \Yii::$app->name );

        if (empty($q)) {
            throw new NotFoundHttpException('Not found');
        }

        $products = Product::find()->where(['like', 'title', $q])->all();

        return $this->render('search', [
            'products' => $products,
            'q' => $q,
        ]);
    }

}