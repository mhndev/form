<?php

include 'input.php';
include 'mobile.php';
include 'email.php';
include 'text.php';
include 'form.php';
include 'submit.php';
include 'helpers.php';
include 'textarea.php';



$input_name = new text('name');
$input_name
    ->setAttribute('label',['label_class'=>'title'])
    ->setAttribute('label',['label_text'=>'Name'])
    ->setAttribute('input',['type'=>'text']);



$input_mobile = new mobile('mobile');
$input_mobile->setAttribute('label',['label_class'=>'title']);
$input_mobile->setAttribute('label',['label_text'=>'Mobile']);
$input_mobile->setAttribute('input',['type'=>'text']);


$input_email = new email('email');
$input_email->setAttribute('label',['label_class'=>'title']);
$input_email->setAttribute('label',['label_text'=>'Email']);
$input_email->setAttribute('input',['type'=>'email']);


$input_message = new textarea('message', 'textarea');
$input_message->setAttribute('label',['label_class'=>'title']);
$input_message->setAttribute('label',['label_text'=>'Message']);




$input_submit = new submit('submit');
$input_submit->setAttribute('button',['class'=>'primary-btn']);
$input_submit->setAttribute('button',['text'=>'Send']);




$form = new form();
$form->addInput($input_name);
$form->addInput($input_mobile);
$form->addInput($input_email);
$form->addInput($input_message);
$form->addInput($input_submit);
