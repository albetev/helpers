<?php

use AB\Form;

$Form = new Form();

$Form->setForm([
    ['setSelect' => [
        'label' => 'select',
        'name' => 'select_name',
        'options' => [1 => 'option1', 2 => 'option2'],
        'selected' => 2
    ]],
    ['setInput' => [
        'label' => 'input',
        'name' => 'input_name',
        'placeholder' => 'placeholder',
        'value' => 'Some text'
    ]],
    ['setInput' => [
        'name' => 'another_input',
        'placeholder' => 'empty one',
        'type' => 'hidden'
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
