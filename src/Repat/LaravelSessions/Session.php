<?php

namespace Repat\LaravelSessions;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Config;

class Session extends \Illuminate\Database\Eloquent\Model
{
    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the model should auto increment.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Indicates if the model has no timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Casting DB fields
     *
     * @var array
     */
    protected $casts = [
        'last_activity' => 'datetime',
    ];

    /**
     * Use parent constructor and set table according to config file
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = Config::get('sessions.table', 'sessions');
    }

    /**
     * Unserialized Payload (base64 decoded too)
     *
     * @return array
     */
    public function getUnserializedPayloadAttribute() : array
    {
        return unserialize(base64_decode($this->payload));
    }

    /**
     * User Relationship
     *
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
