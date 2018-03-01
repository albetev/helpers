<?php

use AB\Form;

$Form = new Form();

$Form->setForm([
    ['setSelect' => [
        'label' => 'select',
        'name' => 'select_name',
        'options' => [1 => 'option1', 1 => 'option2'],
        'option_selected' => 2
    ]],
    ['setInput' => [
        'label' => 'input',
        'placeholder' => 'placeholder',
        'value' => 'Some text'
    ]],
    ['setInput' => [
        'label' => 'another input',
        'placeholder' => 'empty one'
    ]],
    ['setTextArea' => [
        'label' => 'Text Area',
        'name' => 'text',
        'id' => 'descr'
    ]],
    ['setCheckboxes' => [
        'name' => 'amenities[]',
        'params' => [1 => 'checkbox1', 2 => 'checkbox2']
    ]],
    ['setSubmit' => [
        'value' => 'Okay'
    ]]
]);
