<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //シーダーを入れるのに必要な設定
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'mail', 'age'];

    //Personクラスの拡張（P.252）
    public function getData()
    {
    return $this->id. '：'. $this->name . '('. $this->age .')';
    }

}
