<div style="display: block; width: 100%; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    <header style="display: block; width: inherit; text-align: center">
        <div style="display: block; width: 75px; margin: 0 auto">
            <img src="https://bucket.jfestbali.com/images/logo.png"
                style="width: 100%; object-fit: contain; object-position: center; margin-left: -15px; margin-bottom: -10px;" />
        </div>
        <h2>JFest Bali 9</h2>
        <span style="display: block; margin-top: -5px">Exclusive event by JCOS (Japanese Community of STIKOM Bali)</span>
        <div>
            <a href="mailto:info@jfestbali.id">info@jfestbali.id</a>
            <span>|</span>
            <a href="https://jfestbali.id">https://jfestbali.id</a>
        </div>
    </header>

    <main style="display: block; margin-top: 25px">
        <p>
            Dear {{ $user->name }},
            <br><br>
            We are excited to inform you that your payment for order <strong>#{{ $order->reference }}</strong> has been
            successfully processed. Thank you for placing order on JFest Bali 9.
            <br><br>
            Here are the details of your order:
        </p>

        <div>Order Reference: {{ $order->reference }}</div>
        <div>Order Date: {{ $order->created_at }}</div>
        <div>Payment Amount: {{ $formatter->formatCurrency($order->payment->amount, 'IDR') }}</div>
        <div>Payment Fee: {{ $formatter->formatCurrency($order->payment->fee, 'IDR') }}</div>
        <div>Payment Method: {{ Illuminate\Support\Str::title($order->payment->method) }}</div>
        <br>

        <p>Items ordered:</p>
        <ul>
            @foreach ($order->tickets as $ticket)
                <li>{{ $ticket->activity->name }} - {{ $formatter->formatCurrency($ticket->price, 'IDR') }}</li>
            @endforeach
            @foreach ($order->registrations as $registration)
                <li>{{ $registration->competition->name }} - {{ $formatter->formatCurrency($registration->price, 'IDR') }}</li>
            @endforeach
        </ul>

        <br>
        Please remember to bring your ticket QR code picture with you to the event.
        <br>

        @if($order->tickets->count() > 0)
            <a href="{{ route('ticket.download', ['user' => $user->uuid]) }}"
                style="display: inline-block; margin-top: 10px; padding: 10px 15px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">
                Download Your Ticket QR Code(s)
            </a>
        @endif

        @php
            $hasExpoTicket = $order->tickets->contains(function($ticket) {
                return Str::contains(Str::upper($ticket->activity->name), 'EXPO');
            });
        @endphp

        @if($hasExpoTicket)
            <div style="margin-top: 20px;">
                <p style="margin-bottom: 8px;">
                    As an EXPO ticket holder, please fill out the form below for seminar participant data collection:
                </p>
                <a href="https://forms.gle/r5DrZyJWHuZrrxx28"
                    target="_blank"
                    rel="noopener noreferrer"
                    style="display: inline-block; padding: 10px 20px; background-color: #007BFF; color: #ffffff; text-decoration: none; border-radius: 5px;">
                    Isi Form
                </a>
            </div>
        @endif

        <br><br>
        If you have any questions or need assistance, please don't hesitate to reach out to our team at
        <a href="mailto:info@jfestbali.id">info@jfestbali.id</a>.
        <br><br>
        Thank you again for choosing us for your entertainment needs. We’re committed to making your experience
        memorable. We look forward to seeing you at the event!
    </main>

    <footer style="display: block; margin-top: 30px">
        <div>Best regards,</div>
        <div>JFest Bali 9 Team</div>
    </footer>
</div>
