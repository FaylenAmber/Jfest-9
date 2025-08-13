<?php

namespace App\Http\Controllers\User\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Order;
use App\Enums\OrderStatusEnum;

class PaymentFallbackController extends Controller
{
    public function __invoke(Request $request)
    {
        $orderId = $request->query('order_id');

        // Ambil order beserta tiket
        $order = Order::with('tickets')->find($orderId);

        // Default tickets kosong
        $tickets = collect([]);

        // Hanya kirim tickets kalau status order paid
        if ($order && $order->status === OrderStatusEnum::Paid) {
            $tickets = $order->tickets->map(function ($ticket) {
                return [
                    'unique_id' => $ticket->unique_id,
                    'name' => $ticket->name,
                ];
            });
        }

        return Inertia::render('payment/fallback', [
            'data' => [
                'orderId' => $order?->id,
                'statusCode' => $request->query('status_code'),
                'transactionStatus' => $request->query('transaction_status'),
                'tickets' => $tickets->values(), // kirim hanya jika paid
            ],
            ...$this->withLinkProps($request, [
                'historyPageUrl' => route('user.history.index')
            ]),
            ...$this->withAuthProps($request),
            ...$this->withMetaProps([
                'head' => [
                    'title' => $this->appName . ' - Thanks'
                ]
            ])
        ]);
    }
}
