<?php

require 'vendor/autoload.php';

use Chop\Finder3;

$finder = new Finder3;
$finder->find(4, [1, 3, 5]);

print_r(array_slice([1, 2, 3], 1, 5));
