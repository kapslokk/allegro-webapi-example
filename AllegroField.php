<?php

class AllegroField
{
    const VALUE_STRING = 0;
    const VALUE_INT = 1;
    const VALUE_FLOAT = 2;
    const VALUE_IMAGE = 3;
    const VALUE_DATETIME = 4;
    const VALUE_DATE = 5;
    const VALUE_RANGE_INT = 6;
    const VALUE_RANGE_FLOAT = 7;
    const VALUE_RANGE_DATE = 8;

    public $id;
    public $value = null;
    public $valueType;

    /**
     * AllegroField constructor.
     * @param $id
     * @param null $value
     * @param $valueType
     */
    public function __construct($id, $value, $valueType)
    {
        $this->id        = $id;
        $this->value     = $value;
        $this->valueType = $valueType;
    }

    public function toArray(){
        $keyNames = array(
            self::VALUE_STRING => 'fvalueString',
            self::VALUE_INT => 'fvalueInt',
            self::VALUE_FLOAT => 'fvalueFloat',
            self::VALUE_IMAGE => 'fvalueImage',
            self::VALUE_DATETIME => 'fvalueDateTime',
            self::VALUE_DATE => 'fvalueDate',
            self::VALUE_RANGE_INT => 'fvalueRangeInt',
            self::VALUE_RANGE_FLOAT => 'fvalueRangeFloat',
            self::VALUE_RANGE_DATE => 'fvalueRangeDate',
        );

        $array = array(
            'fid' => $this->id,
            'fvalueString' => "",
            'fvalueInt' => 0,
            'fvalueFloat' => 0,
            'fvalueImage' => 0,
            'fvalueDateTime' => 0,
            'fvalueDate' => 0,
            'fvalueRangeInt' => array(
                'fvalueRangeIntMin' => 0,
                'fvalueRangeIntMax' => 0,
            ),
            'fvalueRangeFloat' => array(
                'fvalueRangeFloatMin' => 0,
                'fvalueRangeFloatMax' => 0,
            ),
            'fvalueRangeDate' => array(
                'fvalueRangeDateMin' => 0,
                'fvalueRangeDateMax' => 0,
            ),
        );

        $value = array(
            $keyNames[$this->valueType] => $this->value
        );
        return array_merge($array, $value);
    }
}
