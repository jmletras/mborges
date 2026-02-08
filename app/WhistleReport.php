<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WhistleReport extends Model
{
  protected $table = 'whistle_reports';

  protected $fillable = [
    'uuid',
    'is_anonymous',
    'name',
    'email',
    'subject',
    'description',
    'status',
    'encrypted_metadata',
  ];

  protected $casts = [
    'is_anonymous' => 'boolean',
    'name'         => 'encrypted',
    'email'        => 'encrypted',
    'description'  => 'encrypted',
    'encrypted_metadata' => 'encrypted',
  ];

  /* -------------------------
     | Relationships
     |-------------------------*/

  public function messages(): HasMany
  {
    return $this->hasMany(WhistleMessage::class, 'report_id');
  }

  // public function attachments(): HasMany
  // {
  //   return $this->hasMany(WhistleAttachment::class, 'report_id');
  // }

  /* -------------------------
     | Scopes
     |-------------------------*/

  public function scopeOpen($query)
  {
    return $query->whereIn('status', ['novo', 'analise']);
  }
}
