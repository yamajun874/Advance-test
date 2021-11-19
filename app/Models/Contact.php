<?php

namespace App\Models;

use App\Rules\JapaneseZip;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = array(
        'fullname', 'gender', 'email', 'postcord', 'address', 'building_name', 'opinion'
    );

    public static $rules = array(
        'fullname' => 'required',
        'gender' => 'required',
        'email' => 'required|email',
        'postcord' => 'required',
        'address' => 'required',
        'opinion' => 'required|max:120'
    );

}