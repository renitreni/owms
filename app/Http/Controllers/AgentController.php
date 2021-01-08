<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Agent;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\AgentStoreRequest;

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
            $value->referred_count = Candidate::query()->where('agent_id', $value->id)->count();
            return collect($value)->toArray();
        })->make(true);
    }

    public function create()
    {
        return view('components.agent-form');
    }

    public function store(AgentStoreRequest $request)
    {
        $agent            = new Agent();
        $agent->agency_id = auth()->id();
        $agent->name      = $request->name;
        $agent->email     = $request->email;
        $agent->phone     = $request->phone;
        $agent->address   = $request->address;
        $agent->status    = 'active';
        $agent->save();

        return redirect()->route('agents')->with('success', 'New Agent has been added!');
    }

    public function show($id)
    {
        if (! Agent::belongsToAgency($id, auth()->id())) {
            abort(403);
        }
        $result = Agent::query()->where('id', $id)->get()[0];

        return view('components.agent-edit', compact('result'));
    }

    public function update(AgentStoreRequest $request)
    {
        $agent            = Agent::find($request->input('id'));
        $agent->agency_id = auth()->id();
        $agent->name      = $request->name;
        $agent->email     = $request->email;
        $agent->phone     = $request->phone;
        $agent->address   = $request->address;
        $agent->status    = 'active';
        $agent->save();

        return redirect()->route('agents')->with('success', 'Agent has been updated!');
    }
}
