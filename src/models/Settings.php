<?php

namespace reflexions\intercom\models;

use craft\base\Model;

class Settings extends Model
{
    public $appId = '';
    public $secretKey = '';
    public $groupHandle = '';

    public function rules()
    {
        return [
            [['appId', 'secretKey'], 'required']
        ];
    }
}