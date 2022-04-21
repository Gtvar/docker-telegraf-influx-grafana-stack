# Example Docker Compose project for Telegraf, InfluxDB and Grafana

This an example project to show the TIG (Telegraf, InfluxDB and Grafana) stack.

#### Monitored Stack:
- nginx
- phpfpm
- mongo
- elasticsearch
- docker

![Nginx](./screenshot/nginx.png?raw=true "Nginx")
![PHP](./screenshot/phpfpm.png?raw=true "PHP")
![Mongo](./screenshot/mongo.png?raw=true "Mongo")
![ElasticSearch](./screenshot/es.png?raw=true "ElasticSearch")
![System](./screenshot/system.png?raw=true "System")
![System](./screenshot/system2.png?raw=true "System")
![Docker](./screenshot/docker.png?raw=true "Docker")
![Docker](./screenshot/docker2.png?raw=true "Docker")
![Summary](./screenshot/summary.png?raw=true "Summary")

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
