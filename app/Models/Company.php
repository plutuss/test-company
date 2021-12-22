<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * @return BelongsToMany
     */
    public function сlients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class);
    }

    /**
     * @param $val
     */
    public function setNameAttribute($val)
    {
        $this->attributes['name'] = $val;
        $this->attributes['slug'] = Str::slug($val, '-');
    }

    /**
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
