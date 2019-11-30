<?php


namespace ExcelWriter\Model;


class HeaderCell extends Cell
{
    const TYPE_INTEGER = 'integer';
    const TYPE_DATE = 'date';
    const TYPE_DATETIME = 'datetime';
    const TYPE_STRING = 'string';
    const TYPE_TIME = 'time';
    const TYPE_PRICE = 'price';
    const TYPE_DOLLAR = 'dollar';
    const TYPE_EURO = 'euro';

    /**
     * @var integer
     */
    private $columnWidth;

    /**
     * @var string
     */
    private $dataType;

    public function __construct($value, string $dataType = self::TYPE_STRING, CellStyle $style = null)
    {
        $this->columnWidth = 10;
        $this->dataType = $dataType;

        parent::__construct($value, $style);
    }

    /**
     * @return int|null
     */
    public function getColumnWidth(): ?int
    {
        return $this->columnWidth;
    }

    /**
     * @param int $columnWidth
     * @return self
     */
    public function setColumnWidth(int $columnWidth): self
    {
        $this->columnWidth = $columnWidth;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDataType(): ?string
    {
        return $this->dataType;
    }

    /**
     * @param string $dataType
     * @return self
     */
    public function setDataType(string $dataType): self
    {
        $this->dataType = $dataType;
        return $this;
    }
}