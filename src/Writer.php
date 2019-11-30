<?php


namespace ExcelWriter;

use ExcelWriter\Exception\InvalidParameterClassException;
use ExcelWriter\Model\Cell;
use ExcelWriter\Model\HeaderCell;
use XLSXWriter;

class Writer
{
    /**
     * @var string[]
     */
    private $letters;

    public function __construct()
    {
        $this->letters = $this->getLetters();
    }

    private function getLetters()
    {
        $letters = range('A', 'Z');
        $final = $letters;
        foreach($letters as $letter) {
            foreach($letters as $secondLetter) {
                $final[] = $letter.$secondLetter;
            }
        }
        return $final;
    }

    public static function createWriter(): XLSXWriter
    {
        return new XLSXWriter();
    }

    /**
     * @param XLSXWriter $writer
     * @param string $sheet
     * @param Cell[] $cells
     * @throws
     */
    public static function writeRow(XLSXWriter $writer, string $sheet, array $cells): void
    {
        $row = [];
        foreach ($cells as $cell) {
            if(!$cell instanceof Cell) {
                throw new InvalidParameterClassException();
            }

            $row[] = $cell->getValue();
        }

        $styles = array_map(function(Cell $cell) {
            return $cell->getStylesArray();
        }, $cells);

        $writer->writeSheetRow($sheet, $row, $styles);
    }

    /**
     * @param XLSXWriter $writer
     * @param string $sheet
     * @param HeaderCell[] $cells
     * @param int $freezeRows
     * @param int $freezeColumns
     * @param bool $autoFilter
     * @throws
     */
    public static function writeHeaderRow(
        XLSXWriter $writer,
        string $sheet,
        array $cells,
        int $freezeRows = null,
        int $freezeColumns = null,
        bool $autoFilter = false
    ): void
    {
        $row = [];
        foreach ($cells as $cell) {
            if(!$cell instanceof HeaderCell) {
                throw new InvalidParameterClassException();
            }

            $row[$cell->getValue()] = $cell->getDataType();
        }

        $styles = array_map(function(HeaderCell $cell) {
            return $cell->getStylesArray();
        }, $cells);

        $styles['widths'] = array_map(function(HeaderCell $cell) {
            return $cell->getColumnWidth();
        }, $cells);

        if($freezeRows !== null) {
            $styles['freeze_rows'] = $freezeRows;
        }

        if($freezeColumns !== null) {
            $styles['freeze_columns'] = $freezeColumns;
        }

        if($autoFilter) {
            $styles['auto_filter'] = true;
        }

        $writer->writeSheetHeader($sheet, $row, $styles);
    }


    /**
     * @param XLSXWriter $writer
     * @param string $filename
     * @throws
     */
    public static function writeToFile(XLSXWriter $writer, string $filename)
    {
        $writer->writeToFile($filename);
    }
}