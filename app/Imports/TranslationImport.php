<?php

namespace App\Imports;

use App\Models\User;
use App\Models\ErrorLog;
use App\Helpers\Common\Functions;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\LearnerAdditionalField;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TranslationImport implements ToCollection, SkipsEmptyRows, WithHeadingRow
{
    /**
     * @param Collection $collection
     */

    function __construct()
    {
    }

    public function collection(Collection $rows)
    {
        $x = 1;
        $date = date('Y-m-d H:i:s');
        foreach ($rows as $row) {
            $x++;
            // $label_id=isset($row['id']) ? $row['id'] : 0;
            $isLabel = false;
            if (isset($row['label'])) {
                $label = $row['label'];
                $labelsRec = DB::table('labels')->where(DB::raw('BINARY `label`'), $label)->first();
                if ($labelsRec) {
                    $label_id = $labelsRec->id;
                    // DB::table('labels')->where('id', $label_id)->update(['label' => $label, 'updated_at' => $date]);
                    $isLabel = true;
                } else {
                    $label_id = DB::table('labels')->insertGetId([
                        'label' => $label,
                        'active' => 1,
                        'created_at' => $date,
                        'updated_at' => $date
                    ]);
                }

                $languages = DB::table('languages')->Where('active', 1)->orderBy('id','asc')->get();
           
                foreach ($languages as $language) {
                    $name = strtolower($language->name);
                    $language_id = $language->id;
                    // if ($isLabel && isset($row[$name]) && isset($row[$name]) !="") {
                    $value = isset($row[$name]) ? $row[$name] : '';

                    $trans = DB::table('translations')->where('language_id', $language_id)
                        ->where('label_id', $label_id)
                        ->first();
                    if ($trans) {
                        if ($isLabel && $value != "") {
                            DB::table('translations')->where('id', $trans->id)->update(['value' => $value, 'updated_at' => $date]);
                        }
                    } else {
                        DB::table('translations')->insertGetId([
                            'label_id' => $label_id,
                            'language_id' => $language_id,
                            'value' => $value,
                            'created_at' => $date,
                            'updated_at' => $date
                        ]);
                    }
                    // }
                }
            }
        }

        return redirect(route('admin.translations'))->with('success', 'Updated!');
    }
}
