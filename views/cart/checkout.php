<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="<?= \yii\helpers\Url::home() ?>">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Checkout</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 cart-table">
        <?php if(!empty($session['cart'])): ?>
        <div class="col-lg-12 table-responsive mb-5 overlay">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                <tr>
                    <th>Product</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody class="align-middle">
                <?php foreach ($_SESSION['cart'] as $id=>$item): ?>
                <tr>
                    <td class="align-middle">
                        <?php if (isset($item['image'])): ?>
                            <?= yii\helpers\Html::img("@web/{$item['image']}", ['style' => 'width: 50px; height: 50px;']) ?>
                        <?php endif; ?>
                    </td>
                    <td class="align-middle"><?= $item['title'] ?></td>
                    <td class="align-middle">$<?= $item['price'] ?></td>
                    <td class="align-middle">
                        <?= $item['qty'] ?>
                    </td>
                    <td class="align-middle">
                            <a href="<?= \yii\helpers\Url::to(['cart/del-item', 'id'=>$id]) ?>"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else:?>
        <h3>Your cart is empty</h3>
        <?php endif;?>
    </div>
</div>
<!-- Cart End -->

<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div class="mb-4">
                <h4 class="font-weight-semi-bold mb-6">Add a New Details</h4>
                <?php $form = \yii\widgets\ActiveForm::begin() ?>
                <?= $form->field($order, 'name') ?>
                <?= $form->field($order, 'email') ?>
                <?= $form->field($order, 'phone') ?>
                <?= $form->field($order, 'address') ?>
                <?= \yii\helpers\Html::submitButton('Delivery', ['class'=>'submit btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3']) ?>
                <?php \yii\widgets\ActiveForm::end() ?>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                </div>
                <?php if(!empty($session['cart'])): ?>
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3">Products</h5>
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                    <div class="d-flex justify-content-between">
                        <p><?= $item['title'] ?></p>
                        <p>$<?= $item['price'] * $item['qty'] ?></p>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">$<?= $session['cart.sum'] ?></h5>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->
