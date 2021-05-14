<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Agency;
use App\Models\AlertLevel;
use App\Models\AgencyAlert;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class AgencyController extends Controller
{
    public function index()
    {
        return view('layouts.app', [
            "header"    => 'Agencies',
            "component" => 'agency-page',
            "data"      => [
                'datatable_link'  => route('agencies.table'),
                'store_link'      => route('agencies.store'),
                'store_new_alert' => route('agencies.alert.store'),
                'get_alerts'      => route('agencies.alert.list'),
                'delete_alerts'   => route('agencies.alert.delete'),
            ],
        ]);
    }

    public function table()
    {
        return DataTables::of(Agency::all())->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('F j, Y');

            $value->update_link = route('agencies.update', ['agency' => $value->id]);
            $value->delete_link = route('agencies.destroy', ['agency' => $value->id]);
            $value->level       = AgencyAlert::query()->where('agency_id', $value->id)->first('alert_id')->alert_id ?? '';
            $value->alert       = AlertLevel::query()->where('id', $value->level)->first();

            return collect($value)->toArray();
        })->make(true);
    }

    public function store(Request $request)
    {
        $path = $request->file('logo')->store('agency_logos');
        Agency::create([
            'name'       => $request->name,
            'address'    => $request->address,
            'logo_path'  => $path,
            'poea'       => $request->poea,
            'status'     => $request->status,
            'created_by' => auth()->id(),
        ]);

        return ['success' => true];
    }

    public function update(Request $request)
    {
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('agency_logos');
            Storage::delete($request->logo_path);
            Agency::query()->where('id', $request->id)->update(['logo_path' => $path]);
        }

        Agency::query()->where('id', $request->id)->update([
            'name'       => $request->name,
            'address'    => $request->address,
            'poea'       => $request->poea,
            'status'     => $request->status,
            'created_by' => auth()->id(),
        ]);

        AgencyAlert::updateOrCreate(['agency_id' => $request->id], [
            'alert_id'   => $request->level,
            'created_by' => auth()->id(),
        ]);

        return ['success' => true];
    }

    public function destroy(Agency $agency)
    {
        Storage::delete($agency->logo_path);
        Agency::destroy($agency->id);

        return ['success' => true];
    }

    public function storeAlert(Request $request)
    {
        AlertLevel::create([
            "color_level" => $request->color_level,
            "description" => $request->description,
            "name"        => $request->name,
            "created_by"  => auth()->id(),
        ]);

        return ['success' => true];
    }

    public function alertList(Request $request)
    {
        return AlertLevel::all();
    }

    public function deleteAlert(Request $request)
    {
        return AlertLevel::destroy($request->id);
    }
}
