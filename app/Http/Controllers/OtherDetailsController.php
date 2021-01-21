<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Document;
use App\Models\OptionList;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\FlightStoreRequest;
use App\Http\Requests\DocumentStoreRequest;

class OtherDetailsController extends Controller
{
    public function show($id)
    {
        $options = OptionList::query()->where('type', 'docs')->get();

        return view('components.agency.employee-details', compact('options', 'id'));
    }

    public function storeDocument(DocumentStoreRequest $request)
    {
        $path                   = $request->file('attachment')->store('docs');
        $document               = new Document();
        $document->candidate_id = $request->candidate_id;
        $document->type         = $request->document;
        $document->path         = $path;
        $document->created_by   = auth()->id();
        $document->save();

        return redirect()->back()->with('success', 'New Document has been inserted');
    }

    public function tableDocuments()
    {
        $results = Document::query()->where('created_by', auth()->id());

        return DataTables::of($results)->setTransformer(function ($value) {
            $value->created_at_display = Carbon::parse($value->created_at)->format('M j, Y');

            return collect($value)->toArray();
        })->make(true);
    }

    public function deleteDocuments(Request $request)
    {
        \Storage::delete($request->path);
        Document::destroy($request->id);

        return ['success' => true];
    }
}
