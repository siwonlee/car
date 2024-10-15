<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait; 


class Vendor extends Model
{
    use HasFactory;
 
    protected $table = 'vendor';


    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'vendorid'  => 10,
            'sname'   => 10,
            'address'   => 10,
            'city'    => 10,
            'zip'    => 10,
 
        ]
    ];

    public $appends = [
    'coordinate', 'map_popup_content',
    ];
 

    public function getCoordinateAttribute()
    {
    if ($this->latitude && $this->longitude) {
    return $this->latitude.', '.$this->longitude;
    }
    }
    public function getMapPopupContentAttribute()
    {
   
    $mapPopupContent = '';
    $mapPopupContent .= '<div class="my-2">'.$this->sname.'</div>';
    $mapPopupContent .= '<div class="my-2">'.$this->vendorid.'</div>';
    $mapPopupContent .= '<div class="my-2">'.$this->address.'</div>';
    $mapPopupContent .= '<div class="my-2">'.$this->city.' '.$this->state.' , '.$this->zip.'</div>';
    $mapPopupContent .= '<div class="my-2"><a href='.route('vselect.log',[
                  'vendorid'=>$this->vendorid,
                  'sname'=>$this->sname,
                  'address'=>$this->address,
                  'city'=>$this->city,
                  'state'=>$this->state,
                  'zip'=>$this->zip,
                // 'username'=> auth(),
                //   'userid'=>Auth::guard("sanctum")->user(),

                 ]).'><button class="btn btn-primary">Select</button></a></div>';
 
    // $mapPopupContent .= '<div class="my-2"><strong>'.__('outlet.coordinate').':</strong><br>'.$this->coordinate.'</div>';

    return $mapPopupContent;
    }

}
