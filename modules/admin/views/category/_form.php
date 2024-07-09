<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Category $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?php //= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group field-category-parent_id-status has-success">
        <label class="control-label" for="category-parent_id-status">Status</label>
        <select id="category-parent_id-status" class="form-control" name="Category[parent_id]" aria-invalid="false">
            <option value="0">Not have parent</option>
            <?= \app\components\MenuWidget::widget([
                'tpl' => 'select',
                'model' => $model,
                'cache_time' => 0,
            ]) ?>
        </select>

        <div class="help-block"></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
