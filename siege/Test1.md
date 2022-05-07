``
siege -b  -c10  -v -t150s -f siege/siege-urls.txt
``

Lifting the server siege...
Transactions:		        1095 hits
Availability:		      100.00 %
Elapsed time:		      149.70 secs
Data transferred:	        5.74 MB
Response time:		        1.36 secs
Transaction rate:	        7.31 trans/sec
Throughput:		        0.04 MB/sec
Concurrency:		        9.96
Successful transactions:        1095
Failed transactions:	           0
Longest transaction:	        6.40
Shortest transaction:	        0.99


``
siege -b  -c25  -v -t150s -f siege/siege-urls.txt
``

Lifting the server siege...
Transactions:		         516 hits
Availability:		      100.00 %
Elapsed time:		      149.54 secs
Data transferred:	        2.71 MB
Response time:		        7.10 secs
Transaction rate:	        3.45 trans/sec
Throughput:		        0.02 MB/sec
Concurrency:		       24.50
Successful transactions:         516
Failed transactions:	           0
Longest transaction:	       15.64
Shortest transaction:	        0.87

``
siege -b  -c50  -v -t150s -f siege/siege-urls.txt
``

Lifting the server siege...
Transactions:		         455 hits
Availability:		      100.00 %
Elapsed time:		      149.99 secs
Data transferred:	        2.39 MB
Response time:		       15.71 secs
Transaction rate:	        3.03 trans/sec
Throughput:		        0.02 MB/sec
Concurrency:		       47.66
Successful transactions:         455
Failed transactions:	           0
Longest transaction:	       27.68
Shortest transaction:	        7.64


``
siege -b  -c100  -v -t150s -f siege/siege-urls.txt
``

Lifting the server siege...
Transactions:		         920 hits
Availability:		       99.46 %
Elapsed time:		      149.39 secs
Data transferred:	        5.62 MB
Response time:		       15.47 secs
Transaction rate:	        6.16 trans/sec
Throughput:		        0.04 MB/sec
Concurrency:		       95.26
Successful transactions:         920
Failed transactions:	           5
Longest transaction:	       25.91
Shortest transaction:	        1.36