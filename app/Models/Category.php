<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Category extends Model
{
    use HasFactory;
    protected $table = 'apl_category';

    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'cate'  => 10,
            'cate_desc'   => 10,
  
 
        ]
    ];



}
