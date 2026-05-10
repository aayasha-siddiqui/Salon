<h2>Salon Enquiry Form</h2>

<form method="POST" action="#">
@csrf

<input type="text" name="name" placeholder="Your Name"><br><br>

<input type="email" name="email" placeholder="Email"><br><br>

<input type="text" name="phone" placeholder="Phone"><br><br>

<textarea name="message" placeholder="Your Enquiry"></textarea><br><br>

<button type="submit">Submit Enquiry</button>

</form>