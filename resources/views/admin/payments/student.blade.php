@extends('layouts.admin')

@section('content')

<h2 class="text-xl font-bold mb-4">
Payment History - {{ $student->name }}
</h2>

<div class="mb-4">

<p><b>Course Fee:</b> ₹{{ $courseFee }}</p>
<p><b>Total Paid:</b> ₹{{ $totalPaid }}</p>
<p><b>Pending:</b> ₹{{ $pending }}</p>

</div>

<table class="table-auto w-full border">

<thead>
<tr class="bg-gray-200">
<th class="p-2">Amount</th>
<th class="p-2">Method</th>
<th class="p-2">Date</th>
</tr>
</thead>

<tbody>

@foreach($student->payments as $payment)

<tr class="border-b">

<td class="p-2">
₹{{ $payment->amount }}
</td>

<td class="p-2">
{{ $payment->payment_method }}
</td>

<td class="p-2">
{{ $payment->payment_date }}
</td>

</tr>

@endforeach

</tbody>

</table>

@endsection