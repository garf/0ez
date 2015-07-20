<?php namespace App\Classes;

/**
 * Class Title
 * @package App\Classes
 */
class Title
{
    /**
     * @var array
     */
    protected $values = [];
    /**
     * Delimiter between title sections
     *
     * @var string
     */
    protected $delimiter;

    /**
     * Constructor
     *
     * @param $value
     * @param string $delimiter
     */
    function __construct($value, $delimiter = ' :: ')
    {
        $this->values[] = $value;
        $this->delimiter = $delimiter;
    }


    /**
     * Stick section after existing title
     *
     * @param string $value
     * @param null $delimiter
     */
    public function append($value = '', $delimiter = null)
    {
        $this->values[] = $delimiter ?: $this->delimiter;
        $this->values[] = $value;
    }

    /**
     * Stick section before existing title
     *
     * @param string $value
     * @param null $delimiter
     */
    public function prepend($value = '', $delimiter = null)
    {
        array_unshift($this->values, $value, $delimiter ?: $this->delimiter);
    }

    /**
     * Render title
     *
     * @return string
     */
    public function render()
    {
        return implode('', $this->values);
    }

    /**
     * Get Last section
     *
     * @return mixed
     */
    public function last()
    {
        return end($this->values);
    }

    /**
     * Get first section
     *
     * @return mixed
     */
    public function first()
    {
        return reset($this->values);
    }

    /**
     * Stringify sections
     *
     * @return string
     */
    function __toString()
    {
        return $this->render();
    }
} 