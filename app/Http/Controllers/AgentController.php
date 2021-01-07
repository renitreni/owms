<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Agent;
use Yajra\DataTables\DataTables;

class AgentController extends Controller
{
    public function index()
    {
        return view('components.agent');
    }

    public function table(Agent $agent)
    {
        $agent = $agent->newQuery()->where('agency_id', auth()->id());

        return DataTables::of($agent)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('F j, Y');

            return collect($value)->toArray();
        })->make(true);
    }
}
