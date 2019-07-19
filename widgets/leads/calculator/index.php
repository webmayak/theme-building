<?php

use frontend\themes\building\widgets\leads\calculator\LeadCalculator;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model LeadCalculator */
/* @var $key string */
?>
<div class="title-home text-center">
    БЕСПЛАТНЫЙ РАСЧЕТ СТОИМОСТИ ПРОЕКТА
</div>
<?php $form = ActiveForm::begin([
    'id' => 'lead-call-me-form',
    'action' => ['/leads/default/save', 'key' => $key],
    'options' => [
        'class' => 'lead-form',
    ],
    'validateOnBlur' => false,
    'validateOnChange' => false,
    'fieldConfig' => [
        'template' => "{input}\n{hint}\n{error}",
    ],
]) ?>
<div class="row">
    <div class="col-md-3">
        <?= $form->field($model, 'name')->textInput([
            'placeholder' => $model->getAttributeLabel('name'),
        ]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'email')->textInput([
            'placeholder' => $model->getAttributeLabel('email'),
        ]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'region')->textInput([
            'placeholder' => $model->getAttributeLabel('region'),
        ]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'phone')->textInput([
            'placeholder' => $model->getAttributeLabel('phone'),
        ]) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="checkbox-list">
            <div class="checkbox-list__header">
                Укажите, какие услуги вам нужны:
            </div>
            <?= $form->field($model, 'services')->checkboxList($model->getServicesList(), [
                'item' => function ($index, $label, $name, $checked, $value) {
                    return Html::checkbox($name, $checked, [
                        'value' => $value,
                        'labelOptions' => [
                            'class' => 'checkbox-list__item',
                        ],
                        'class' => 'checkbox-list__input',
                        'label' => $label,
                    ]);
                },
            ]) ?>
        </div>
    </div>
    <div class="col-md-6">
        <ul>
            <li>Опишите максимально подробно ваши пожелания по выбранным услугам.</li>
            <br>
            <li>Укажите размеры, этажность и предназначение будущей постройки.</li>
            <br>
            <li>Сообщите о наличии перепадов высот на участке и прочую информацию, которую посчитаете важной для
                корректного расчета вашей заявки.
            </li>
            <br>
        </ul>
        <?= $form->field($model, 'description')->textarea([
            'rows' => 5,
            'placeholder' => $model->getAttributeLabel('description'),
        ]) ?>
    </div>
</div>
<div class="text-center">
    <?= Html::submitButton(Html::tag('span', 'Отправить', [
        'class' => 'ladda-label',
    ]), [
        'class' => 'btn btn-success ladda-button',
        'data' => [
            'style' => 'zoom-in'
        ],
    ]); ?>
</div>
<?php ActiveForm::end(); ?>
