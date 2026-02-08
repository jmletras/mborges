<?php

namespace App\Policies;

use App\User;
use App\WhistleReport;

class WhistleReportPolicy
{
  /**
   * Ver lista de denúncias
   */
  public function viewAny(User $user): bool
  {
    return $user->can('manage-whistleblowing');
  }

  /**
   * Ver denúncia específica
   */
  public function view(User $user, WhistleReport $report): bool
  {
    return $user->can('manage-whistleblowing');
  }

  /**
   * Responder a denúncia
   */
  public function reply(User $user, WhistleReport $report): bool
  {
    return $user->can('manage-whistleblowing');
  }
}
