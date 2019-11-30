# Lightweight PHP >7.1 Excel Writer

    This library uses https://github.com/mk-j/PHP_XLSXWriter as engine
    It's only OOP wrapper
    
    As the engine, this library don't waste memory and is written for fast generation of huge sheets
    

### Installation
    
    composer require oskargunther/excel-writer

### Example of usage
```php
include_once 'vendor/autoload.php';

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
$header = new Header();
$header
    ->setAutoFilter(true)
    ->setFreezeColumns(0)
    ->setFreezeRows(1)
    ->createCell('Column1', HeaderCell::TYPE_STRING, $headerCellStyle)
    ->addCell((new HeaderCell('Column2', HeaderCell::TYPE_DATETIME, $headerCellStyle))->setColumnWidth(20));

Writer::writeHeaderRow($writer, $sheet, $header);



// Writing data
$data = [
    ['Value1', date('Y-m-d H:i:s')],
    ['Value2', date('Y-m-d H:i:s')]
];
$column2Style = new CellStyle();
$column2Style->setFontStyle(CellStyle::FONT_STYLE_BOLD, CellStyle::FONT_STYLE_ITALIC);
$column2Style->setBorderStyle(CellStyle::BORDER_STYLE_DOTTED);
$column2Style->setBorder(CellStyle::BORDER_BOTTOM, CellStyle::BORDER_LEFT);

foreach ($data as $dataRow) {
    $row = new Row();

    $row
        ->setHeight(30)
        ->createCell($dataRow[0])
        ->addCell((new Cell($dataRow[1], $column2Style)));

    Writer::writeRow($writer, $sheet, $row);
}




// Saving file
Writer::writeToFile($writer, 'example.xlsx');
```
 
 
[Example .xlsx File](https://github.com/oskargunther/excel-writer/raw/master/examples/example.xlsx)