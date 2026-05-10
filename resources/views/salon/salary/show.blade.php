@extends('salon.layouts.app')

@section('content')

<div class="container">

<div class="card shadow p-4">

<h4>{{ $staff_salary->staff->name }}</h4>

<p><strong>Month:</strong> {{ $staff_salary->month }}</p>

<hr>

<p>Total Service Amount:
<strong>₹{{ $staff_salary->total_service_amount }}</strong></p>

<p>Commission:
<strong>₹{{ $staff_salary->commission_amount }}</strong></p>

<p>Final Salary:
<strong class="text-success">
₹{{ $staff_salary->final_salary }}
</strong></p>

</div>
</div>

@endsection