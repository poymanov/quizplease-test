<?php

use app\models\Category;
use app\models\ProductType;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\SelectWidget\SelectWidget;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */

$categoriesLink = Url::to('/category');
$typesLink = Url::to('/type');
$productsLink = Url::to('/product');

?>

<a class="btn btn-primary" href="<?=$categoriesLink?>">Categories</a>
<a class="btn btn-primary" href="<?=$typesLink?>">Types</a>
<a class="btn btn-primary" href="<?=$productsLink?>">Products</a>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_id')->widget(SelectWidget::class, [
        'dataClass' => ProductType::class
    ]) ?>

    <?= $form->field($model, 'category_id')->widget(SelectWidget::class, [
        'dataClass' => Category::class
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

