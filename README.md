# aerospike-vs-riak
Aerospike libs vs Riak libs. Very simplified, yet realistic tests for small to medium websites/apps.

Remember: __Never trust someone else's tests, do your own.__

#Foreword
I am not Google.
I don't own gazillions of servers in a cloud.
Riak and Aerospike are both awesome databases that scale exceptionally well, however this test doesn't include their performance in a cluster.

This test is about as simple as it can be: You have a __single server__ which is accessing the database that is also hosted locally. This is not realistic for high-end websites, however many small websites and services actually do have a setup similar to what I described.

#What is important?
For the particular use case that I chose, since __reading requests represent about 99% of all requests__ for me, reading performance is what I'm interested in. I do not care about writing performance, if you do please run your own tests (you should do that anyway).

#Why are the tests "unfair"?
Aerospike offers mostly compiled client libs while Riak offers source libs in the targeted programming language.
Therefore in most cases Aerospike will have a little performance advantage since native modules are faster.
If you call that "unfair" or not is up to you, however this is not a raw comparison, this test compares their individual libraries.

#Do it yourself
* Setup a new droplet on DigitalOcean
* Install Riak
* Install Aerospike
* Configure them to use a comparable storage engine
* Install the client libs you're interested in
* Populate server with some data
* Run your tests

#node.js
In my case I was very interested to compare the node.js libs of Riak and Aerospike. However it turned out that [Aerospike doesn't support node.js 0.12 yet](https://github.com/aerospike/aerospike-client-nodejs/issues/44). Since most node.js folks are people who care about the latest technology (myself included) I don't think anyone wants to see tests for 0.10. The projects where I'm using node.js are all using 0.12 so I had to cancel this test.

Results:

    Not available.

__Psssht, Aerospike! Implement node.js 0.12 support, we desperately need it.__

#PHP
PHP is frowned upon by many developers (myself included) for obvious reasons that I'm not going to list here. However it was interesting for me to test it because I actually own a site that uses this setup.

Results:

    Iterations: 10,000.

    Aerospike: 0.0001184355974197 sec/GET
    Riak:      0.0020599334955215 sec/GET

#Python
TODO

#C/C++
TODO