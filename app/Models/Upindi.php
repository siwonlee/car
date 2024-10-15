<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 


class Upindi extends Model
{
    use HasFactory;
 

    protected $table = 'collect';


 



    protected $fillable = [
    
        'upc'  ,
        'category' ,
        'subcategory' ,  
        'brand'   , 
        'description' ,
        'size' ,
        'uom' ,  
        'add_date'  ,
        'edit_date'  ,
        'add_staff'  ,
        'user_id'  ,
        'add_source'  ,
        'type'  ,
        'approved'  ,
        'comment'  ,
        'pic' ,       
        'pic1' ,
        'pic2',
        'high_cost' ,
        'processed' ,
        'removed',
        'timestamp', 
        'updated_at', 
        'created_at' 
    
    
    ];
    







}