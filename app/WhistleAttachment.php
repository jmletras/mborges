<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WhistleAttachment extends Model
{
  protected $table = 'whistle_attachments';

  public $timestamps = false;

  protected $fillable = [
    'report_id',
    'path',
    'original_name',
    'mime_type',
    'size',
  ];

  /* -------------------------
     | Relationships
     |-------------------------*/

  public function report(): BelongsTo
  {
    return $this->belongsTo(WhistleReport::class, 'report_id');
  }
}
