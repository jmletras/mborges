<?php

namespace App\Http\Controllers;

use App\WhistleReport;
use App\WhistleMessage;
use App\User;
// use App\WhistleAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Notifications\NewWhistleReportNotification;

class PublicWhistleReportController extends Controller
{
  /* -------------------------
     | Formulário nova denúncia
     |-------------------------*/
  public function create()
  {
    return view('whistle.public.create');
  }

  /* -------------------------
     | Submeter denúncia
     |-------------------------*/
  public function store(Request $request)
  {
    $data = $request->validate([
      'is_anonymous' => 'required|boolean',
      'name'         => 'nullable|string|max:255',
      'email'        => 'nullable|email|max:255',
      'subject'      => 'required|string|max:255',
      'description'  => 'required|string',
      // 'attachments.*' => [
      //   'nullable',
      //   'file',
      //   'max:10240', // 10MB
      //   'mimetypes:application/pdf,image/jpeg,image/png'
      // ],
    ]);

    if ($data['is_anonymous']) {
      $data['name'] = null;
      $data['email'] = null;
    }

    if ($request->filled('website')) {
      abort(422);
    }

    DB::beginTransaction();

    try {
      $report = WhistleReport::create([
        'uuid'         => (string) Str::uuid(),
        'is_anonymous' => $data['is_anonymous'],
        'name'         => $data['name'] ?? null,
        'email'        => $data['email'] ?? null,
        'subject'      => $data['subject'],
        'description'  => $data['description'],
        'status'       => 'novo',
      ]);

      // if ($request->hasFile('attachments')) {
      //   foreach ($request->file('attachments') as $file) {
      //     $path = $file->store(
      //       'whistleblowing/' . $report->uuid
      //     );

      //     WhistleAttachment::create([
      //       'report_id'    => $report->id,
      //       'path'         => $path,
      //       'original_name' => $file->getClientOriginalName(),
      //       'mime_type'    => $file->getClientMimeType(),
      //       'size'         => $file->getSize(),
      //     ]);
      //   }
      // }

      DB::commit();

      $admins = User::where('id', 2)->get();

      foreach ($admins as $admin) {
        $admin->notify(new NewWhistleReportNotification($report));
      }

      return redirect()
        ->route('whistle.thankyou', $report->uuid);
    } catch (\Throwable $e) {
      DB::rollBack();
      throw $e;
    }
  }

  /* -------------------------
     | Página código denúncia
     |-------------------------*/
  public function thankYou(string $uuid)
  {
    return view('whistle.public.thankyou', compact('uuid'));
  }

  /* -------------------------
     | Acompanhar denúncia
     |-------------------------*/
  public function show(Request $request)
  {
    $request->validate([
      'uuid' => 'required|uuid',
    ]);

    $report = WhistleReport::where('uuid', $request->uuid)->first();

    if (!$report) {
      return back()->withErrors([
        'uuid' => 'Código inválido.'
      ]);
    }

    return view('whistle.public.show', [
      'report'   => $report,
      'messages' => $report->messages()->latest()->get(),
    ]);
  }

  /* -------------------------
     | Responder à denúncia
     |-------------------------*/
  public function reply(Request $request, string $uuid)
  {
    $request->validate([
      'message' => 'required|string',
    ]);

    $report = WhistleReport::where('uuid', $uuid)->first();

    if (!$report) {
      return back()->withErrors([
        'uuid' => 'Código inválido.'
      ]);
    }

    WhistleMessage::create([
      'report_id'  => $report->id,
      'sender_type' => 'whistleblower',
      'message'    => $request->message,
    ]);

    return redirect()->back()->with('success', 'Mensagem enviada.');
  }
}
