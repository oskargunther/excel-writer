<?php


namespace ExcelWriter;

use ExcelWriter\Exception\InvalidParameterClassException;
use ExcelWriter\Model\Cell;
use ExcelWriter\Model\Header;
use ExcelWriter\Model\HeaderCell;
use ExcelWriter\Model\Row;
use XLSXWriter;

class Writer
{
    public static function createWriter(): XLSXWriter
    {
        return new XLSXWriter();
    }

    /**
     * @param XLSXWriter $writer
     * @param string $sheet
     * @param Row $xlsxRow
     * @throws
     */
    public static function writeRow(XLSXWriter $writer, string $sheet, Row $xlsxRow): void
    {
        $row = [];
        foreach ($xlsxRow->getCells() as $cell) {
            if(!$cell instanceof Cell) {
                throw new InvalidParameterClassException();
            }

            $row[] = $cell->getValue();
        }

        $styles = array_map(function(Cell $cell) {
            return $cell->getStylesArray();
        }, $xlsxRow->getCells());

        if($xlsxRow->getHeight() !== null) {
            $styles['height'] = $xlsxRow->getHeight();
        }

        $styles['hidden'] = $xlsxRow->isHidden();
        $styles['collapsed'] = $xlsxRow->isCollapsed();

        $writer->writeSheetRow($sheet, $row, $styles);
    }

    /**
     * @param XLSXWriter $writer
     * @param string $sheet
     * @param Header $header
     * @throws
     */
    public static function writeHeaderRow(
        XLSXWriter $writer,
        string $sheet,
        Header $header
    ): void
    {
        $row = [];
        foreach ($header->getCells() as $cell) {
            if(!$cell instanceof HeaderCell) {
                throw new InvalidParameterClassException();
            }

            $row[$cell->getValue()] = $cell->getDataType();
        }

        $styles = array_map(function(HeaderCell $cell) use ($header) {
            if($header->getStyle()) {
                return $header->getStyle()->toArray();
            }

            return $cell->getStylesArray();
        }, $header->getCells());

        if(!empty($header->getWidths())) {
            $styles['widths'] = $header->getWidths();
        } else {
            $styles['widths'] = array_map(function(HeaderCell $cell) {
                return $cell->getColumnWidth();
            }, $header->getCells());
        }

        if($header->getFreezeRows() !== null) {
            $styles['freeze_rows'] = $header->getFreezeRows();
        }

        if($header->getFreezeColumns() !== null) {
            $styles['freeze_columns'] = $header->getFreezeColumns();
        }

        if($header->isAutoFilter()) {
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