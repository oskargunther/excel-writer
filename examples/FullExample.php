<?php

include_once '../vendor/autoload.php';

use ExcelWriter\Writer;
use ExcelWriter\Model\HeaderCell;
use ExcelWriter\Model\CellStyle;
use ExcelWriter\Model\Cell;

$writer = Writer::createWriter();


// Writing headers
$headerCellStyle = new CellStyle();
$headerCellStyle->setColor('#FFF');
$headerCellStyle->setFill('#000');

$sheet = 'example';

Writer::writeHeaderRow($writer, $sheet, [
    (new HeaderCell('Column1', HeaderCell::TYPE_STRING, $headerCellStyle)),
    (new HeaderCell('Column2', HeaderCell::TYPE_DATETIME, $headerCellStyle))
        ->setColumnWidth(20),
], $freezeRow = 1, $freezeColumn = 0, $autoFilter = true);



// Writing data
$column2Style = new CellStyle();
$column2Style->setFontStyle(CellStyle::FONT_STYLE_BOLD, CellStyle::FONT_STYLE_ITALIC);
$column2Style->setBorderStyle(CellStyle::BORDER_STYLE_DOTTED);
$column2Style->setBorder(CellStyle::BORDER_BOTTOM, CellStyle::BORDER_LEFT);

Writer::writeRow($writer, $sheet, [
    (new Cell('value')),
    (new Cell(date('Y-m-d H:i:s'), $column2Style))
]);



// Saving file
Writer::writeToFile($writer, 'example.xlsx');