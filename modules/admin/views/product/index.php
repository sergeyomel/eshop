<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'category_id',
            [
              'attribute' => 'category_id',
              'value' => function($data) {
                    return $data->category->name ? $data->category->name : false;
              },
            ],
            'name',
            //'content',
            'price',
            [
              'attribute' => 'hit',
              'value' => function($data) {
                    return !$data->hit ? '<span class="text-danger">нет</span>' : '<span class="text-success">да</span>';
              },
              'format' => 'raw'
            ],
            [
              'attribute' => 'new',
              'value' => function($data) {
                    return !$data->new ? '<span class="text-danger">нет</span>' : '<span class="text-success">да</span>';
              },
              'format' => 'raw'
            ],
            [
              'attribute' => 'sale',
              'value' => function($data) {
                    return !$data->sale ? '<span class="text-danger">нет</span>' : '<span class="text-success">да</span>';
              },
              'format' => 'raw'
            ],
            // 'keywords',
            // 'description',
            // 'img',
            // 'hit',
            // 'new',
            // 'sale',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
