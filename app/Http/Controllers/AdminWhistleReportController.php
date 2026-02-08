<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\WhistleReport;
use App\WhistleMessage;
use App\Services\WhistleLogger;
use Illuminate\Http\Request;

class AdminWhistleReportController extends Controller
{
  public function __construct()
  {
    $this->middleware(['auth']);
  }

  /* -------------------------
     | Lista denúncias
     |-------------------------*/
  public function index()
  {
    $this->authorize('viewAny', WhistleReport::class);

    $reports = WhistleReport::orderByDesc('created_at')->paginate(20);

    return view('whistle.admin.index', compact('reports'));
  }

  /* -------------------------
     | Ver denúncia
     |-------------------------*/
  public function show(int $id)
  {
    $report = WhistleReport::with(['messages'])
      ->findOrFail($id);

    $this->authorize('view', $report);

    WhistleLogger::log('admin_view_report', $report->id);

    return view('whistle.admin.show', compact('report'));
  }

  /* -------------------------
     | Responder denúncia
     |-------------------------*/
  public function reply(Request $request, int $id)
  {
    $request->validate([
      'message' => 'required|string',
      'status'  => 'required|in:novo,analise,fechado',
    ]);

    $report = WhistleReport::findOrFail($id);

    $this->authorize('reply', $report);

    WhistleMessage::create([
      'report_id'   => $report->id,
      'sender_type' => 'admin',
      'message'     => $request->message,
    ]);

    $report->update([
      'status' => $request->status,
    ]);

    WhistleLogger::log('admin_reply', $report->id);


    return redirect()->back()->with('success', 'Resposta enviada.');
  }
}
