<?php
require "vendor\autoload.php";
use League\Csv\Reader;

// By setting the header offset we index all records
// with the header record and remove it from the iteration
$csv = Reader::createFromPath('./Equipes.csv');
$csv ->setHeaderOffset(0);
//dump($csv);
$header = $csv->getHeader();
dump($header);
echo "_______________________";
$records = $csv->getRecords();
foreach ($records as $record) {
    dump($record);
}
