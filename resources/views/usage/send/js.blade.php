<pre>
<code class="language-js">
var settings = {
    "url": "https://pwm.kurob.web.id/api/v1/message/store?number=628992141874&text=TEST",
    "method": "POST",
    "timeout": 0,
    "headers": {
    "Accept": "application/json",
    "Authorization": "Bearer {{ $user->api_token }}"
    },
};

$.ajax(settings).done(function (response) {
    console.log(response);
});
</code>
</pre>