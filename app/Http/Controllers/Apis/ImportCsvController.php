<?php

namespace App\Http\Controllers\Apis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportCsvController extends Controller
{
    /**
     * save imported data to db
     *
     * @param  array  $request
     * @return json $response
     */
    protected function importCsv(Request $request)
    {
        $name  = $request->input("name");
        $price = $request->input("price");
        $sku   = $request->input("sku");
        $desc  = $request->input("desc");
        ini_set('max_execution_time', 3000);
        DB::table('import_csv')->insert(
            ['product_name' => $name, 'price' => $price, 'sku' => $sku, 'description' => $desc]
        );
        return "Success";
    }
}
