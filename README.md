# Example Docker Compose project for Telegraf, InfluxDB and Grafana

This an example project to show the TIG (Telegraf, InfluxDB and Grafana) stack.

#### Monitored Stack:
- nginx
- phpfpm
- mongo
- elasticsearch
- docker

#### Example screenshots

![Nginx](./screenshots/nginx.png?raw=true "Nginx")
![PHP](./screenshots/phpfpm.png?raw=true "PHP")
![Mongo](./screenshots/mongo.png?raw=true "Mongo")
![ElasticSearch](./screenshots/es.png?raw=true "ElasticSearch")
![System](./screenshots/system.png?raw=true "System")
![System](./screenshots/system2.png?raw=true "System")
![Docker](./screenshots/docker.png?raw=true "Docker")
![Docker](./screenshots/docker2.png?raw=true "Docker")
![Summary](./screenshots/summary.png?raw=true "Summary")

## Start the stack with docker compose

```bash
$ docker-compose up
```

## Services and Ports

### Grafana
- URL: http://localhost:3000 
- User: admin 
- Password: admin 


## Run the PHP Example

The PHP example generates random example metrics. Use mongo lib for write and read data.

```bash
$ cd app
$ composer install
$ ab -n 1000 -c 3 http://localhost:8080/
```

## Stress Test Practice

1. Open page with generation mongo data
![Generate](http://localhost:8080/telegraf/generate "Generate")

2. Run siege

```bash
siege -b  -c10  -v -t120s -f siege/siege-urls.txt
```

## Probabilistic cache flushing example

``
app/src/Repository/Redis/TelegrafCacheRepository.php:21

## Test results

``
siege/Test1.md
``