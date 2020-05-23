<pre>
<code class="language-js">
var settings = {
    "url": "https://pwm.kurob.web.id/api/v1/maps/location/106.034481/-5.998866",
    "method": "GET",
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