<?php


namespace ExcelWriter\Model;


class Header
{
    /**
     * @var HeaderCell[]
     */
    private $cells;

    /**
     * @var boolean
     */
    private $autoFilter;

    /**
     * @var int
     */
    private $freezeRows;

    /**
     * @var int
     */
    private $freezeColumns;

    /**
     * @var CellStyle
     */
    private $style;

    /**
     * @return HeaderCell[]|null
     */
    public function getCells(): ?array
    {
        return $this->cells;
    }

    public function addCell(HeaderCell $cell): self
    {
        $this->cells[] = $cell;
        return $this;
    }

    public function createCell($value, string $dataType = HeaderCell::TYPE_STRING, CellStyle $style = null): self
    {
        $this->cells[] = new HeaderCell($value, $dataType, $style);
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isAutoFilter(): ?bool
    {
        return $this->autoFilter;
    }

    /**
     * @param bool $autoFilter
     * @return self
     */
    public function setAutoFilter(bool $autoFilter): self
    {
        $this->autoFilter = $autoFilter;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFreezeRows(): ?int
    {
        return $this->freezeRows;
    }

    /**
     * @param int $freezeRows
     * @return self
     */
    public function setFreezeRows(int $freezeRows): self
    {
        $this->freezeRows = $freezeRows;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFreezeColumns(): ?int
    {
        return $this->freezeColumns;
    }

    /**
     * @param int $freezeColumns
     * @return self
     */
    public function setFreezeColumns(int $freezeColumns): self
    {
        $this->freezeColumns = $freezeColumns;
        return $this;
    }

    /**
     * @return CellStyle|null
     */
    public function getStyle(): ?CellStyle
    {
        return $this->style;
    }

    /**
     * @param CellStyle $style
     * @return self
     */
    public function setStyle(CellStyle $style): self
    {
        $this->style = $style;
        return $this;
    }

}