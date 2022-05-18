#Nginx Caching static files

Send first request, we wil see for header `Cache: MISS`.
And we can check `/var/cache/img` directory with cache files.

``
❯ curl -I http://localhost:8080/1.png
HTTP/1.1 200 OK
Server: nginx/1.21.6
Date: Wed, 18 May 2022 18:53:47 GMT
Content-Type: image/png
Content-Length: 76727
Connection: keep-alive
Last-Modified: Wed, 18 May 2022 18:30:12 GMT
ETag: "62853b34-12bb7"
Cache: MISS
Remote-addr: 172.21.0.1
Accept-Ranges: bytes
``

After send next two request response will have header `Cache: HIT`.


``
❯ curl -I http://localhost:8080/1.png
HTTP/1.1 200 OK
Server: nginx/1.21.6
Date: Wed, 18 May 2022 18:55:12 GMT
Content-Type: image/png
Content-Length: 76727
Connection: keep-alive
Last-Modified: Wed, 18 May 2022 18:30:12 GMT
ETag: "62853b34-12bb7"
Cache: HIT
Remote-addr: 172.21.0.1
Accept-Ranges: bytes
``

If we want purge cache for changing content we can send request with header `Cache-Purge: 1`
We will see response header `Cache: BYPASS` and content will have changed.

``
❯ curl -I http://localhost:8080/1.png -H 'Cache-Purge: 1'
HTTP/1.1 200 OK
Server: nginx/1.21.6
Date: Wed, 18 May 2022 18:55:44 GMT
Content-Type: image/png
Content-Length: 76727
Connection: keep-alive
Last-Modified: Wed, 18 May 2022 18:30:12 GMT
ETag: "62853b34-12bb7"
Cache: BYPASS
Remote-addr: 172.21.0.1
Accept-Ranges: bytes
``
