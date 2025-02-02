<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function make_payment(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'amount_paid' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $transaction = Transaction::findOrFail($request->transaction_id);

            $total_amount = (int) $transaction->grand_total;
            $total_paid = (int) Payment::where('transaction_id', $transaction->id)->sum('amount_paid');
            $remaining_balance = $total_amount - ($total_paid + $request->amount_paid);
            $previous_balance = (int) $transaction->total_balance; 

            if ($remaining_balance > 0) {
                $status = 'partially_paid';
            } elseif ($remaining_balance == 0) {
                $status = 'paid';
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Pembayaran melebihi jumlah tagihan'
                ], 400);
            }

            $payment = Payment::create([
                'transaction_id' => $transaction->id,
                'amount_paid' => $request->amount_paid,
                'previous_balance' => $previous_balance,
                'remaining_balance' => $remaining_balance,
                'status' => $status,
                'payment_date' => now()->format('Y-m-d')
            ]);

            // mengurangi total_balance dan grand_total di transactions
            $transaction->decrement('total_balance', $request->amount_paid);
            $transaction->decrement('grand_total', $request->amount_paid);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Pembayaran berhasil',
                'data' => $payment
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan, pembayaran gagal',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
