<?php


class AllegroFieldset
{
    /**
     * @var AllegroField[]
     */
    private $fields = array();

    public function add(AllegroField $field){
        $this->fields[$field->id] = $field;
        return $this;
    }

    public function toArray(){
        $array = [];
        foreach($this->fields as $field){
            $array[] = $field->toArray();
        }
        return $array;
    }
}