## Install Environment

The `.env` file in project root directory contains several environment variables that are used to configure the project.
The `docker-compose.yaml` file in project root directory contains docker definitions of servers...
## Startup Containers

In project root directory, run:

```bash
docker compose up
```

You can also startup the containers in the background by executing:

```bash
docker compose start
```

## Symfony Project Initialization (run only once)

```bash
# Start bash inside of the php container
docker-compose exec server bash

# If you, already, have some older symfony code, then, firstly, remove folder project/vendor
rm -rf project/vendor

# Install dependencies and update composer
composer selfupdate
composer install

```

After completing these steps the services are accessible via the URLs:

## URLs

* Root url: `http://localhost:20080/`


## API URLs
* Circle calculation api: [GET] `http://localhost:20080/circle/{radius}`
* Triangle calculation api: [GET] `http://localhost:20080/triangle/{a}/{b}/{c}`


### Request circle example

`GET /circle/7`

    curl -i -X GET -H 'Content-Type: application/json' http://localhost:20080/circle/7

### Response

    HTTP/1.1 200 OK
    Cache-Control: no-cache, private
    Content-Type: application/json
    Date: Fri, 23 Sep 2022 16:18:06 GMT
    X-Powered-By: PHP/7.4.30
    X-Robots-Tag: noindex
    Content-Length: 70

    {
        "type":"circle",
        "radius":7,
        "surface":153.938,
        "circumference":43.9823
    }

### Request triangle example

`GET /triangle/7/8/9`

    curl -i -X GET -H 'Content-Type: application/json' http://localhost:20080/triangle/7/8/9

### Response

    HTTP/1.1 200 OK
    Cache-Control: no-cache, private
    Content-Type: application/json
    Date: Fri, 23 Sep 2022 16:19:38 GMT
    X-Powered-By: PHP/7.4.30
    X-Robots-Tag: noindex
    Content-Length: 75

    {
        "type":"triangle",
        "a":7,"b":8,"c":9,
        "surface":312.9217,
        "circumference":24
    }
