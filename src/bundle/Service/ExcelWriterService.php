<?php


namespace ExcelWriterBundle\Service;

use ExcelWriter\Exception\InvalidParameterClassException;
use ExcelWriter\Model\Header;
use ExcelWriter\Model\Row;
use ExcelWriter\Writer;
use XLSXWriter;

class ExcelWriterService
{
    /** @var XLSXWriter */
    private $writer;

    public function __construct()
    {
        $this->reset();
    }

    public function reset()
    {
        $this->writer = new XLSXWriter();
    }

    /**
     * @param string $sheet
     * @param Header $header
     * @throws InvalidParameterClassException
     */
    public function writeHeaderRow(string $sheet, Header $header)
    {
        Writer::writeHeaderRow($this->writer, $sheet, $header);
    }

    /**
     * @param string $sheet
     * @param Row $row
     * @throws InvalidParameterClassException
     */
    public function writeRow(string $sheet, Row $row)
    {
        Writer::writeRow($this->writer, $sheet, $row);
    }

    public function save(string $filename)
    {
        Writer::writeToFile($this->writer, $filename);
    }
}