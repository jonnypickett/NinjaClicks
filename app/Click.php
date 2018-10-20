<?php

namespace App;

use App\Provider;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clicks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider_id', 'date', 'total_clicks',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'total_clicks' => 'int',
    ];

    /**
     * The Provider of the click data
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
