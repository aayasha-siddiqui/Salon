<!DOCTYPE html>

<html>

<head>

   <title>Ayesha Users</title>

</head>

<body>

<h1>Ayesha API Users</h1>

@foreach($users as $user)

   <div style="border:1px solid black; margin:10px; padding:10px;">

      <h3>Name: {{ $user['name'] }}</h3>

      <p>Email: {{ $user['email'] }}</p>

      <p>Phone: {{ $user['phone'] }}</p>

   </div>

@endforeach

</body>

</html>