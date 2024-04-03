<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
 
class State extends Model {
    protected $primaryKey = 'idstate';
    public $timestamps = false;
    protected $table = 'state';
    protected $fillable = ['idstate','state','population','counties'];

    public function countries(): HasMany {
        return $this->hasMany(Country::class, 'idstate', 'idstate');
    }
}