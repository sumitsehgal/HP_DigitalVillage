<p>Hello {{$user->name()}},</p>
<p>Welcome to Digital Class Room. Your login details are as follows:</p>

<p>Username: {{$user->username}}</p>
<p>Password: {{$password}}</p>

<br/>
For more details contact us at hpecsrclarity@gmail.com
<br/>
<br/>

<p>Thank you</p>
<span>{{$center->name()}}</span>
<div>
    @if($center->isAdmin())
        Administrator
    @else
        Center Head
    @endif
</div>