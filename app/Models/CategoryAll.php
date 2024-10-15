<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class CategoryAll extends Model
{
    use HasFactory;
    protected $table = 'apl_category_all';

    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'cate'  => 10,
            'cate_desc'   => 10,
            'subcate'   => 10,
            'sub_desc'    => 10,
 
        ]
    ];



}
