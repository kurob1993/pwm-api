<pre>
<code class="language-php">
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://pwm.kurob.web.id/api/v1/maps/location/106.034481/-5.998866",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Accept: application/json",
    "Authorization: Bearer {{ $user->api_token }}"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
</code>
</pre>