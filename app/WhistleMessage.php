<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WhistleMessage extends Model
{
  protected $table = 'whistle_messages';

  public $timestamps = false;

  protected $fillable = [
    'report_id',
    'sender_type',
    'message',
  ];

  protected $casts = [
    'message' => 'encrypted',
  ];

  /* -------------------------
     | Relationships
     |-------------------------*/

  public function report(): BelongsTo
  {
    return $this->belongsTo(WhistleReport::class, 'report_id');
  }
}
