<?php

namespace App\Notifications;

use App\WhistleReport;
// use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewWhistleReportNotification extends Notification
{
  // use Queueable;

  protected WhistleReport $report;

  public function __construct(WhistleReport $report)
  {
    $this->report = $report;
  }

  public function via($notifiable)
  {
    return ['mail'];
  }

  public function toMail($notifiable)
  {
    return (new MailMessage)
      ->subject('Nova denúncia submetida')
      ->line('Foi submetida uma nova denúncia no canal interno.')
      ->line('Data: ' . $this->report->created_at)
      // ->action(
      //   'Ver denúncias',
      //   url('http://www.mborgesimobiliaria.pt/admin/denuncias/' . $this->report->id)
      // )
      ->line('Este email não contém dados sensíveis.');
  }
}
