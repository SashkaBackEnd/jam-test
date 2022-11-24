<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model admin\modules\shop\models\Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'alias',
                            'langs',
                            'article',
                            'status',
                            'available',
                            'product_type',
                            'title_picture__id',
                            'url:url',
                            'show_at_home',
                            'price_formation_type',
                            'price',
                            'price_max',
                            'price_client',
                            'points',
                            'limit',
                            'discount_distr',
                            'discount_client',
                            'discount_partner',
                            'is_register',
                            'currency__id',
                            'product_special_statuses__id',
                            'is_deleted',
                            'rating',
                            'admin_rating',
                            'is_admin_rating',
                            'likes_count',
                            'dislikes_count',
                            'defult_visibility_status',
                            'created_by',
                            'created_at',
                            'created_ip',
                            'modified_at',
                            'modified_by',
                            'modified_ip',
                            'width',
                            'height',
                            'length',
                            'weight',
                            'admin_likes',
                            'admin_dislikes',
                            'left_zero',
                            'leftover',
                            'volume',
                            'quantity_in_one_place',
                            'activity_month',
                            'getcourse_url:ntext',
                            'sort',
                        ],
                    ]) ?>
                </div>
                <!--.col-md-12-->
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>