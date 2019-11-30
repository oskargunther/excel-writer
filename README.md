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

Writer::writeHeaderRow($writer, $sheet, [
    (new HeaderCell('Column1', HeaderCell::TYPE_STRING, $headerCellStyle)),
    (new HeaderCell('Column2', HeaderCell::TYPE_DATETIME, $headerCellStyle))
        ->setColumnWidth(20),
], $freezeRow = 1, $freezeColumn = 0, $autoFilter = true);



// Writing data
$data = [
    ['Value1', date('Y-m-d H:i:s')],
    ['Value2', date('Y-m-d H:i:s')]
];
$column2Style = new CellStyle();
$column2Style->setFontStyle(CellStyle::FONT_STYLE_BOLD, CellStyle::FONT_STYLE_ITALIC);
$column2Style->setBorderStyle(CellStyle::BORDER_STYLE_DOTTED);
$column2Style->setBorder(CellStyle::BORDER_BOTTOM, CellStyle::BORDER_LEFT);

foreach ($data as $row) {
    Writer::writeRow($writer, $sheet, [
        (new Cell($row[0])),
        (new Cell($row[1], $column2Style))
    ]);
}




// Saving file
Writer::writeToFile($writer, 'example.xlsx');
```

[Example .xlsx File](https://github.com/oskargunther/excel-writer/raw/master/examples/example.xlsx)