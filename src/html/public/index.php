<?php
function run()
{
    $i = 0;
    while ($i < 100) {
        $i = mt_rand(1, 101);
    }
    if ($i < 9) {
        return 0;
    }
    return mt_rand(9, $i);
}

$i = mt_rand(8888, 9999);

$randomStr = "";
while ($i > 0) {
    $randomStr .= run();
    $i--;
}

echo $randomStr;