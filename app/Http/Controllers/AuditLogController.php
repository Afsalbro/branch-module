<?php

namespace App\Http\Controllers;
use OwenIt\Auditing\Models\Audit;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function index(Request $request)
    {
        $query = Audit::with('user')->latest();

        // Filter by auditable type
        if ($request->has('auditable_type')) {
            $query->where('auditable_type', $request->auditable_type);
        }

        // Filter by event type
        if ($request->has('event')) {
            $query->where('event', $request->event);
        }

        $audits = $query->paginate(20);

        return view('audits.index', compact('audits'));
    }
}
