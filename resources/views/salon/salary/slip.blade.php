<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Salary Slip</title>

<style>

body{
font-family: DejaVu Sans, sans-serif;
padding:30px;
}

.header{
text-align:center;
margin-bottom:30px;
}

.header h2{
margin:0;
color:#8B6B3E;
}

.table{
width:100%;
border-collapse:collapse;
margin-top:20px;
}

.table td{
padding:10px;
border-bottom:1px solid #ccc;
}

.total{
font-weight:bold;
color:#198754;
font-size:18px;
}

.footer{
margin-top:40px;
text-align:center;
font-size:12px;
color:#777;
}

</style>

</head>

<body>

<div class="header">
<h2>A1 Makeover</h2>
<p>Staff Salary Slip</p>
</div>

<table class="table">

<tr>
<td><strong>Staff Name</strong></td>
<td>{{ $salary->staff->name }}</td>
</tr>

<tr>
<td><strong>Service Earnings</strong></td>
<td>₹{{ number_format($salary->service_total,2) }}</td>
</tr>

<tr>
<td><strong>Bonus</strong></td>
<td>₹{{ number_format($salary->bonus,2) }}</td>
</tr>

<tr>
<td><strong>Total Salary</strong></td>
<td class="total">₹{{ number_format($salary->final_salary,2) }}</td>
</tr>

<tr>
<td><strong>Salary Period</strong></td>
<td>
{{ \Carbon\Carbon::parse($salary->from_date)->format('d M Y') }}
-
{{ \Carbon\Carbon::parse($salary->to_date)->format('d M Y') }}
</td>
</tr>

<tr>
<td><strong>Generated Date</strong></td>
<td>{{ now()->format('d M Y') }}</td>
</tr>

</table>

<div class="footer">
This is a system generated salary slip.
</div>

</body>
</html>