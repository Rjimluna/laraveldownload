<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remittance extends Model
{
    //Table Name
    protected $table = 'remittances';

    public $primaryKey = 'id';

    public $timestamps = true;
}
