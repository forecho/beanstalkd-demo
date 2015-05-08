<?php
include '../vendor/autoload.php';

use Pheanstalk\Pheanstalk;

$pheanstalk = new Pheanstalk('127.0.0.1');

while (true) {
    $tubeId = rand(1, 9);
    $r1 = rand(1, 10000000);
    $r2 = rand(1, 10000000);
    $pheanstalk->useTube('testtube' . $tubeId)->put('{' . $r1 . ':' . $r2 . '}');
}

