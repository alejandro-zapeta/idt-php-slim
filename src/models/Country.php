<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 
class Country extends Model {
    protected $primaryKey = 'idcountry';
    public $timestamps = false;
    protected $table = 'country';
    protected $fillable = ['idcountry','county','population', 'idstate'];

    public function state(): BelongsTo {
        return $this->belongsTo(State::class, 'idstate')->withDefault();
    }
}