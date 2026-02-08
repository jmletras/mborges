<?php

namespace App\Services;

use App\WhistleAccessLog;
use Illuminate\Support\Facades\Auth;

class WhistleLogger
{
  public static function log(string $action, ?int $reportId = null): void
  {
    WhistleAccessLog::create([
      'report_id' => $reportId,
      'user_id'   => Auth::check() ? Auth::id() : null,
      'action'    => $action,
    ]);
  }
}
