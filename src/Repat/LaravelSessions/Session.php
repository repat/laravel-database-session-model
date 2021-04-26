<?php

namespace Repat\LaravelSessions;

use App\Models\User;
use Carbon\Carbon;
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
     * Use parent constructor and set table according to config file
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = Config::get('sessions.table', 'sessions');
    }

    /**
     * Get Unserialized Payload (base64 decoded too)
     *
     * @return array
     */
    public function getUnserializedPayloadAttribute() : array
    {
        return unserialize(base64_decode($this->payload));
    }

    /**
     * Manually set Payload (base64 encoded / serialized)
     *
     * @return void
     */
    public function setPayload(string $payload)
    {
        $this->payload = serialize(base64_encode($payload));
        $this->save();
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

    /**
     * Last Activity Carbon instance
     *
     * @return Carbon
     */
    public function getLastActivityAtAttribute() : Carbon
    {
        return Carbon::createFromTimestamp($this->last_activity);
    }
}
