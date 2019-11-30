<?php
namespace ExcelWriter\Model;

class Cell
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @var CellStyle
     */
    private $style;

    public function __construct($value, CellStyle $style = null)
    {
        $this->value = $value;
        $this->style = $style;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return self
     */
    public function setValue($value): self
    {
        $this->value = $value;
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

    public function getStylesArray(): array
    {
        if($this->style) {
            return $this->style->toArray();
        }

        return [];
    }
}