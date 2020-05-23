<?php
include('GetAPI.php');
$json =  new GetAPI();

$search = ['Zebra','Lioness','Lion','Hyena','Gnu','Rhinoceros','Elephant','Cheetah'];
foreach ($search as $item) {
    mkdir($item);
    for ($i=0; $i < 4; $i++) { 
        $image = $json->get($item,$i);
        $image_list = json_decode($image);
        foreach ($image_list->results as $value) {
            $url = $value->urls->raw;
            $img = $item.'/'.rand(10000,100000000000000000).'.jpg';
            file_put_contents($img, file_get_contents($url));
        }
    }
}