<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];
    //protected $fillable = ['title','description'];

    protected $dates = ['published_at'];

//    protected $casts = [
//        'published_at' => 'datetime:Y-m-d',
//    ];

    public function getFormattedPublishedAtAttribute()
    {
 //       Carbon::setLocale('ca');
        dd($this->published_at->format('j F'));
    return '11 de gener de 2024';
    }

}
