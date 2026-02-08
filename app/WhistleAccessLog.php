<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WhistleAccessLog extends Model
{
  protected $table = 'whistle_access_logs';

  public $timestamps = false;

  protected $fillable = [
    'report_id',
    'user_id',
    'action',
  ];

  public function report(): BelongsTo
  {
    return $this->belongsTo(WhistleReport::class, 'report_id');
  }
}
