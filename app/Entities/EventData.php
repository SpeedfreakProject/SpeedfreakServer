<?php

namespace Speedfreak\Entities;

use Illuminate\Database\Eloquent\Model;

class EventData extends Model
{
    protected $table = 'event_data';

    /**
     * The associated persona.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'personaId');
    }
}
