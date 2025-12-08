<p>
    <strong>You&apos;ve got mail from {{ $data['name'] }}</strong><br>
    <strong>Email:</strong> {{ $data['email'] }}<br>
    <strong>Phone Number:</strong> {{ $data['phone'] }}
</p>

<p><strong><u>SUBJECT:</u></strong> {{ $data['subject'] }}</p>
<p><strong><u>MESSAGE:</u></strong></p>

<p>{{ $data['message'] }}</p>
