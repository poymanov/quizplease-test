<?php

use yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'summary' => false,
    'columns' => [
        'user_id',
        'name',
    ],
]);