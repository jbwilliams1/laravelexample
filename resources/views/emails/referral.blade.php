@if (!empty($for_service))
<h1>THE FOLLOWING EMAIL WAS SENT USING THE REFERRAL FORM</h1>
<br>
<hr>
@endif
<br><br>
<strong>You've been referred by:</strong>
<br>
<strong>Name:</strong> {{$firstname}} {{$lastname}} <br>
<strong>Email:</strong> {{$email}} <br><br>

Message: <br>
<p>
    {{$c_message}}
</p>
