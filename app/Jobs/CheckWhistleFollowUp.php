<?php

namespace App\Jobs;

use App\WhistleReport;
use App\Services\WhistleLogger;
use Illuminate\Support\Facades\Log;

class CheckWhistleFollowUp
{
  public function handle()
  {
    $reports = WhistleReport::whereIn('status', ['new', 'in_review'])
      ->where('created_at', '<=', now()->subDays(90))
      ->get();

    foreach ($reports as $report) {
      WhistleLogger::log('system_90_day_warning', $report->id);
      Log::error('Whistle report overdue (90 days)', [
        'report_id' => $report->id,
      ]);
    }
  }
}
