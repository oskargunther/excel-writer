<?php


namespace ExcelWriter\Model;


class Row
{
    /**
     * @var Cell[]
     */
    private $cells;

    /**
     * @var integer
     */
    private $height;

    /**
     * @var boolean
     */
    private $hidden;

    /**
     * @var boolean
     */
    private $collapsed;

    /**
     * @return Cell[]|null
     */
    public function getCells(): ?array
    {
        return $this->cells;
    }

    public function addCell(Cell $cell): self
    {
        $this->cells[] = $cell;
        return $this;
    }

    public function createCell($value, CellStyle $style = null): self
    {
        $this->cells[] = new Cell($value, $style);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return self
     */
    public function setHeight(int $height): self
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isHidden(): ?bool
    {
        return $this->hidden;
    }

    /**
     * @param bool $hidden
     * @return self
     */
    public function setHidden(bool $hidden): self
    {
        $this->hidden = $hidden;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isCollapsed(): ?bool
    {
        return $this->collapsed;
    }

    /**
     * @param bool $collapsed
     * @return self
     */
    public function setCollapsed(bool $collapsed): self
    {
        $this->collapsed = $collapsed;
        return $this;
    }

}