<?php

namespace App\Models;

use Carbon\Traits\LocalFactory;
use Illuminate\Database\Eloquent\Model;


class Biller extends Model
{
    protected $table = 'appointments';
    protected $filable = ['id_patient', 'id_doctor', 'date_time', 'status'];

    public $timestamps = false;
}
