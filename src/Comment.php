<?php

namespace Nekra\ExampleComClient;


class Comment
{
    public $id;
    public $name;
    public $text;

    public function __construct(array $data = [])
    {
        foreach ($data as $key => $val) {
            if (property_exists(__CLASS__, $key)) {
                $this->$key = $val;
            }
        }
    }
}