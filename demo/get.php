<?php
include '../vendor/autoload.php';
use Pheanstalk\Pheanstalk;

$pheanstalk = new Pheanstalk('127.0.0.1');

//while (true) {
$job = $pheanstalk->watch('test')->ignore('default')->reserve();
if ($job) {
    echo "<pre>";
    print_r($job);
    echo '<hr>';
    print_r($job->getData());
    $date = date("Y-m-d H:i:s");
    file_put_contents("test.txt", "[{$date}]Hello World. Testing!\n", FILE_APPEND);;
    $pheanstalk->delete($job);
}
//}
echo '<hr>';
echo $pheanstalk->getConnection()->isServiceListening();