<?php

namespace app\models;

use Yii;
use yii\base\Model;

class WidhyModel extends Model
{
    public function Title()
    {
    	$title = 'Klinik';
        return $title;
    } public function base_url()
    {
    	$base_url = 'http://localhost/yii/';
    	return($base_url);
    }
}
