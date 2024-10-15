<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class VendorLog extends Model
{
    use HasFactory;
 

    protected $table = 'vendor_log';


  
 
    protected $fillable = [
        'vendorid' ,
        'sname'   ,
        'address' ,
        'city'    ,
        'state'    ,
        'zip'    ,
        'userid'    ,
        'username'    ,
       
    ];

}