<?php

namespace app\controllers;

use app\models\Cart;
use app\models\OrderProduct;
use app\models\Orders;
use app\models\Product;
use Yii;
use yii\helpers\Html;

class CartController extends AppController
{
    public function actionAdd($id)
    {
        $product = Product::findOne($id);
        if(empty($product)){
            return false;
        }
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);
        if (yii::$app->request->isAjax) {
            return $this->renderPartial('cart-modal', compact('session'));
        }

        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        return $this->renderPartial('cart-modal', compact('session'));
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        return $this->renderPartial('cart-modal', compact('session'));
    }

    public function actionDelItem($id)
    {
        $id= \Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        if (yii::$app->request->isAjax) {
            return $this->renderPartial('cart-modal', compact('session'));
        }
        return $this->redirect(\Yii::$app->request->referrer);

    }

    public function actionCheckout()
    {
        $session = Yii::$app->session;
        $order = new Orders();
        $order_product = new OrderProduct();
        if ($order->load(Yii::$app->request->post())) {
            $order->qty = $session['cart.qty'];
            $order->total = $session['cart.sum'];
            $transaction = \Yii::$app->db->beginTransaction();
            if (!$order->save() || !$order_product->saveOrderProduct($session['cart'], $order->id)) {
                \Yii::$app->session->setFlash('error', 'Error');
                $transaction->rollBack();
            }else{
                $transaction->commit();
                \Yii::$app->session->setFlash('success', 'Success');

                try {
                    Yii::$app->mailer->compose('order', ['session' => $session])
                        ->setFrom([\Yii::$app->params['senderEmail'] => \Yii::$app->params['senderName']])
                        ->setTo(\Yii::$app->params['adminEmail'])
                        ->setSubject('Subject of the Email')
                        ->send();
                } catch (\Exception $e) {
                    echo "Error sending email: " . $e->getMessage();
                }

                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return $this->refresh();
            }
        }
        $this->setMeta("Checkout::" .  \Yii::$app->name);
        return $this->render('checkout',compact('session', 'order'));
    }

}