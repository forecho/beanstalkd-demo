<?php
include '../vendor/autoload.php';

use Pheanstalk\Pheanstalk;

$pheanstalk = new Pheanstalk('127.0.0.1');

//选择使用的tube
$pheanstalk->useTube('test');
//往tube中增加数据
$pheanstalk->put('hello, pheanstalk');