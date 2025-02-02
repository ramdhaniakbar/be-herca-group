<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('marketing')->paginate(10);

        return response()->json([
            'status' => 'success',
            'data' => $transactions
        ]);
    }

    public function commission_calculation()
    {
        $calculations = DB::table('transactions')
                ->select(
                    DB::raw("DATE_FORMAT(date, '%M') as month"),
                    'marketing_id',
                    DB::raw("SUM(grand_total) as omzet"),
                    DB::raw("
                        CASE 
                            WHEN SUM(grand_total) BETWEEN 0 AND 100000000 THEN 0
                            WHEN SUM(grand_total) BETWEEN 100000000 AND 200000000 THEN 0.025
                            WHEN SUM(grand_total) BETWEEN 200000000 AND 500000000 THEN 0.05
                            ELSE 0.1
                        END AS commission
                    "),
                    DB::raw("
                        CASE 
                            WHEN SUM(grand_total) BETWEEN 0 AND 100000000 THEN 0
                            WHEN SUM(grand_total) BETWEEN 100000000 AND 200000000 THEN TRIM(TRAILING '.0' FROM TRIM(TRAILING '.000' FROM SUM(grand_total) * 0.025))
                            WHEN SUM(grand_total) BETWEEN 200000000 AND 500000000 THEN TRIM(TRAILING '.0' FROM TRIM(TRAILING '.000' FROM SUM(grand_total) * 0.05))
                            ELSE TRIM(TRAILING '.0' FROM TRIM(TRAILING '.000' FROM SUM(grand_total) * 0.1))
                        END AS commission_nominal
                    ")
                )
                ->groupBy(DB::raw("DATE_FORMAT(date, '%M')"), 'marketing_id')
                ->orderBy(DB::raw("DATE_FORMAT(date, '%M')"), 'desc')
                ->orderBy('marketing_id', 'asc')
                ->paginate(10);
        
        return response()->json([
            'status' => 'success',
            'data' => $calculations
        ]);
    }
}
