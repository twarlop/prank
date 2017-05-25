3 terminals:

1:
php prank-server.php
2:
php prank-client.php
3:
telnet into server address


- should still be upgraded, so we properly detect ips for local network
might be:
192.168.1.###
192.168.22.###

- should properly deal with disconnects

- client should be run in the background
- client should be kept alive using supervisord
- make sure we don't hogg cpu to much