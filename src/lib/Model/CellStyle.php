<?php


namespace ExcelWriter\Model;



class CellStyle
{
    const FONT_ARIAL = 'Arial';
    const FONT_TIMES_NEW_ROMAN = 'Times New Roman';
    const FONT_COURIER_NEW = 'Courier New';
    const FONT_COMIC_SANS = 'Comic Sans MS';

    const FONT_STYLE_BOLD = 'bold';
    const FONT_STYLE_ITALIC = 'italic';
    const FONT_STYLE_UNDERLINE = 'underline';
    const FONT_STYLE_STRIKETHROUGH = 'strikethrough';

    const BORDER_TOP = 'top';
    const BORDER_BOTTOM = 'bottom';
    const BORDER_LEFT = 'left';
    const BORDER_RIGHT = 'right';

    const BORDER_STYLE_THIN = 'thin';
    const BORDER_STYLE_MEDIUM = 'medium';
    const BORDER_STYLE_THICK = 'thick';
    const BORDER_STYLE_DASH_DOT = 'dashDot';
    const BORDER_STYLE_DASH_DOT_DOT = 'dashDotDot';
    const BORDER_STYLE_DASHED = 'dashed';
    const BORDER_STYLE_DOTTED = 'dotted';
    const BORDER_STYLE_DOUBLE = 'double';
    const BORDER_STYLE_HAIR = 'hair';
    const BORDER_STYLE_MEDIUM_DASH_DOT = 'mediumDashDot';
    const BORDER_STYLE_MEDIUM_DASH_DOT_DOT = 'mediumDashDotDot';
    const BORDER_STYLE_MEDIUM_DASHED = 'mediumDashed';
    const BORDER_STYLE_SLANT_DASH_DOT = 'slantDashDot';

    const HORIZONTAL_ALIGN_GENERAL = 'general';
    const HORIZONTAL_ALIGN_LEFT = 'left';
    const HORIZONTAL_ALIGN_RIGHT = 'right';
    const HORIZONTAL_ALIGN_JUSTIFY = 'justify';
    const HORIZONTAL_ALIGN_CENTER = 'center';

    const VERTICAL_ALIGN_BOTTOM = 'bottom';
    const VERTICAL_ALIGN_CENTER = 'center';
    const VERTICAL_ALIGN_DISTRIBUTED = 'distributed';

    /** @var string */
    private $font;

    /** @var int */
    private $fontSize;

    /** @var string */
    private $fontStyle;

    /** @var string */
    private $border;

    /** @var string */
    private $borderStyle;

    /** @var string */
    private $borderColor;

    /** @var string */
    private $color;

    /** @var string */
    private $fill;

    /** @var string */
    private $horizontalAlign;

    /** @var string */
    private $verticalAlign;

    /** @var boolean */
    private $wrapText;

    public function toArray(): array
    {
        $array = [
            'font' => $this->font,
            'font-size' => $this->fontSize,
            'font-style' => $this->fontStyle,
            'border' => $this->border,
            'border-style' => $this->borderStyle,
            'border-color' => $this->borderColor,
            'color' => $this->color,
            'fill' => $this->fill,
            'halign' => $this->horizontalAlign,
            'valign' => $this->verticalAlign,
            'wrap_text' => $this->wrapText,
        ];

        $result = [];
        foreach ($array as $key => $value) {
            if($value !== null) {
                $result[$key] = $value;
            }
        }

        return $result;
    }

    /**
     * @return string|null
     */
    public function getFont(): ?string
    {
        return $this->font;
    }

    /**
     * @param string $font
     * @return self
     */
    public function setFont(string $font): self
    {
        $this->font = $font;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFontSize(): ?int
    {
        return $this->fontSize;
    }

    /**
     * @param int $fontSize
     * @return self
     */
    public function setFontSize(int $fontSize): self
    {
        $this->fontSize = $fontSize;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFontStyle(): ?string
    {
        return $this->fontStyle;
    }

    /**
     * @param string[] ...$formStyles
     * @return $this
     */
    public function setFontStyle(...$formStyles): self
    {
        $this->fontStyle = implode(',', $formStyles);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBorder(): ?string
    {
        return $this->border;
    }

    /**
     * @param string[] $borders
     * @return self
     */
    public function setBorder(...$borders): self
    {
        $this->border = implode(',', $borders);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBorderStyle(): ?string
    {
        return $this->borderStyle;
    }

    /**
     * @param string $borderStyle
     * @return self
     */
    public function setBorderStyle(string $borderStyle): self
    {
        $this->borderStyle = $borderStyle;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBorderColor(): ?string
    {
        return $this->borderColor;
    }

    /**
     * @param string $borderColor
     * @return self
     */
    public function setBorderColor(string $borderColor): self
    {
        $this->borderColor = $borderColor;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return self
     */
    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFill(): ?string
    {
        return $this->fill;
    }

    /**
     * @param string $fill
     * @return self
     */
    public function setFill(string $fill): self
    {
        $this->fill = $fill;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHorizontalAlign(): ?string
    {
        return $this->horizontalAlign;
    }

    /**
     * @param string $horizontalAlign
     * @return self
     */
    public function setHorizontalAlign(string $horizontalAlign): self
    {
        $this->horizontalAlign = $horizontalAlign;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVerticalAlign(): ?string
    {
        return $this->verticalAlign;
    }

    /**
     * @param string $verticalAlign
     * @return self
     */
    public function setVerticalAlign(string $verticalAlign): self
    {
        $this->verticalAlign = $verticalAlign;
        return $this;
    }

    /**
     * @return bool
     */
    public function isWrapText(): bool
    {
        return $this->wrapText;
    }

    /**
     * @param bool $wrapText
     * @return self
     */
    public function setWrapText(bool $wrapText): self
    {
        $this->wrapText = $wrapText;
        return $this;
    }

}