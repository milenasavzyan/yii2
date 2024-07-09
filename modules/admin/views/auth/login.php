<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = \yii\widgets\ActiveForm::begin(); ?>

        <?= $form->field($model, 'username', [
                'template'=>"<div class='form-group has-feedback'> {input} <span class=\"glyphicon glyphicon-user form-control-feedback\"></span><div>{error}</div></div>",
            ])->textInput(['placeholder'=>'Login']) ?>

        <?= $form->field($model, 'password', [
                'template'=>"<div class='form-group has-feedback'> {input} <span class=\"glyphicon glyphicon-lock form-control-feedback\"></span><div>{error}</div></div>",
            ])->passwordInput(['placeholder'=>'Password']) ?>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox2">
                    <?= $form->field($model, 'rememberMe')->checkbox([
                            'template'=>"{label} {input}"
                    ]) ?>
                </div>
            </div>
            <div class="col-xs-4">
                <?= \yii\helpers\Html::submitButton('Login', ['class'=>'btn btn-primary btn-block btn-flat', ['name'=>'login-button']]) ?>
            </div>
            <!-- /.col -->
        </div>

        <?php $form = \yii\widgets\ActiveForm::end(); ?>

        <!-- /.social-auth-links -->

        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
</div>
