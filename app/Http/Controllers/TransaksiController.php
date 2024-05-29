<?php

namespace App\Http\Controllers;

use App\Models\transactions;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    public function index()
    {
        $rows = transactions::query()->get();
        return view('content.transaction.list', [
            'rows' => $rows
        ]);
    }
    public function printPDF($id)
    {
        $row = transactions::query()->with('ItemTransaction')->first();
        if ($row === null) {
            abort(404);
        }

        $pdf = Pdf::loadView('content.transaction.print-pdf')->setPaper('A4');
        return $pdf->stream('Invoice');


    }
}
