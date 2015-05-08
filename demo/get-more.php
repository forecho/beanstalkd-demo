<?php
include '../vendor/autoload.php';
use Pheanstalk\Pheanstalk;

$pheanstalk = new Pheanstalk('127.0.0.1');

//while (true) {
// $tube_id=rand(1,9);
// $job=$pheanstalk->watch('testtube'.$tube_id)->ignore('default')->reserve();
// if($job){
// 	echo $job->getdata();
// 	$pheanstalk->delete($job);
// }
//switch (variable) {
//	case 'value':
//		# code...
//		break;
//
//	default:
//		# code...
//		break;
//}
$job = $pheanstalk
    ->watch('test')
    ->watch('testtube1')
    ->watch('testtube2')
    ->watch('testtube3')
    ->watch('testtube4')
    ->watch('testtube5')
    ->watch('testtube6')
    ->watch('testtube7')
    ->ignore('default')
    ->reserve();
if ($job) {
    echo "<pre>";
    print_r($pheanstalk->listTubesWatched());
    echo '<hr>';
    print_r($job);
    echo '<hr>';
    print_r($job->getData());

    if ($value == 'test') {
        $date = date("Y-m-d H:i:s");
        file_put_contents("test.txt", "[{$date}][{$value}]Hello World. Testing!\n", FILE_APPEND);;
        $pheanstalk->delete($job);
    }


}
//}
echo '<hr>';
echo $pheanstalk->getConnection()->isServiceListening();