
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Categories</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="<?= \yii\helpers\Url::home() ?>">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Categories</p>
        </div>
    </div>
</div>
<!-- Page Header End -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2"><?= $category->title ?></span></h2>
    </div>
    <?php if (!empty($products)): ?>
        <div class="row px-xl-5 pb-3">
            <?php foreach ($products as $product): ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <?= \yii\helpers\Html::img("@web/{$product->image}", ['alt' => 'offer', 'class' => 'img-fluid w-100']) ?>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?= $product->title ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6>$<?= $product->price ?></h6>
                            <h6 class="text-muted ml-2">
                                <del>$<?= $product->old_price ?></del>
                            </h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>" class="btn btn-sm text-dark p-0">
                            <i class="fas fa-eye text-primary mr-1"></i> View Detail
                        </a>
                        <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id]) ?>" data-id="<?= $product->id ?>" class="btn btn-sm text-dark p-0 add-to-cart">
                            <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <div class="col-md-12">
                <?= \yii\widgets\LinkPager::widget([
                    'pagination' => $pages,
                    'maxButtonCount' => 3,
                ]) ?>
            </div>

        </div>
    <?php else:?>
    <div>
        <h6>There is no product</h6>
    </div>
    <?php endif; ?>
</div>
