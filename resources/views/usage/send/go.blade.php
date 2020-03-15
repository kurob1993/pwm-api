<pre>
<code class="language-go">
package main

import (
    "fmt"
    "net/http"
    "io/ioutil"
)

func main() {

    url := "https://pwm.kurob.web.id/api/v1/message/store?number=628992141874&text=TEST"
    method := "POST"

    client := &http.Client {
    }
    req, err := http.NewRequest(method, url, nil)

    if err != nil {
    fmt.Println(err)
    }
    req.Header.Add("Accept", "application/json")
    req.Header.Add("Authorization", "Bearer {{ $user->api_token }}"

    res, err := client.Do(req)
    defer res.Body.Close()
    body, err := ioutil.ReadAll(res.Body)

    fmt.Println(string(body))
}
</code>
</pre>