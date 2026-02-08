<?php

namespace App\Jobs;

use App\WhistleReport;
use App\Services\WhistleLogger;
use Illuminate\Support\Facades\Log;

class CheckWhistleAcknowledgement
{
  public function handle()
  {
    $reports = WhistleReport::where('status', 'new')
      ->where('created_at', '<=', now()->subDays(7))
      ->get();



    foreach ($reports as $report) {
      WhistleLogger::log('system_7_day_warning', $report->id);

      Log::warning('Whistle report pending acknowledgement', [
        'report_id' => $report->id,
      ]);
    }
  }
}
