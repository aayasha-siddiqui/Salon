@extends('salon.layouts.app')

@section('content')

<div class="container">

<div class="card p-4 shadow">

<h5>Generate Salary</h5>

<form method="POST"
action="{{ route('salary.store') }}">
@csrf

<select name="staff_id"
class="form-control mb-3" required>
<option>Select Staff</option>

@foreach($staffs as $staff)
<option value="{{ $staff->id }}">
{{ $staff->name }}
</option>
@endforeach

</select>

<input type="month"
name="month"
class="form-control mb-3"
required>

<input type="number"
name="bonus"
placeholder="Bonus"
class="form-control mb-3">

<button class="btn btn-dark">
Generate Salary
</button>

</form>

</div>

</div>

@endsection