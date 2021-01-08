<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    public static function destroyByCandidate($id)
    {
        $model = (new static())->newQuery()->where('candidate_id', $id)->get();

        if (isset($model[0])) {
            Storage::delete($model[0]->path);
            $model->delete();
        }
    }
}
