``
siege -b  -c100  -v -t150s -f siege/siege-urls.txt
``

## Without cache

Lifting the server siege...
Transactions:		         522 hits
Availability:		       97.03 %
Elapsed time:		       99.36 secs
Data transferred:	        5.24 MB
Response time:		       17.31 secs
Transaction rate:	        5.25 trans/sec
Throughput:		        0.05 MB/sec
Concurrency:		       90.95
Successful transactions:         522
Failed transactions:	          16
Longest transaction:	       20.40
Shortest transaction:	        1.27

## Simple Cache

Lifting the server siege...
Transactions:		         636 hits
Availability:		       99.38 %
Elapsed time:		       99.40 secs
Data transferred:	        3.96 MB
Response time:		       14.48 secs
Transaction rate:	        6.40 trans/sec
Throughput:		        0.04 MB/sec
Concurrency:		       92.66
Successful transactions:         636
Failed transactions:	           4
Longest transaction:	       17.34
Shortest transaction:	        0.88

## Probabilistic with Ttl

Lifting the server siege...
Transactions:		         649 hits
Availability:		       99.08 %
Elapsed time:		       99.69 secs
Data transferred:	        4.35 MB
Response time:		       14.17 secs
Transaction rate:	        6.51 trans/sec
Throughput:		        0.04 MB/sec
Concurrency:		       92.26
Successful transactions:         649
Failed transactions:	           6
Longest transaction:	       16.39
Shortest transaction:	        0.88


## Probabilistic with Delta

Lifting the server siege...
Transactions:		         644 hits
Availability:		       99.84 %
Elapsed time:		       99.78 secs
Data transferred:	        3.54 MB
Response time:		       14.42 secs
Transaction rate:	        6.45 trans/sec
Throughput:		        0.04 MB/sec
Concurrency:		       93.10
Successful transactions:         644
Failed transactions:	           1
Longest transaction:	       17.24
Shortest transaction:	        0.84