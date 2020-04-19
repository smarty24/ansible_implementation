# ansible_implementation
Automate wordpress deployment process using vagrant virtual machine

# Description
1. create 5 virtual machines
   - ansible_master: control node for ansible deployment
   - frontend: load balancer running Nginx
   - app1: application server with apache2 running wordpress
   - app2: application server with apache2 running wordpress
   - appdb1: MySQL database server for app1 and app2
2. Ensure that application is only available through load balancer and can't be reached directly
3. Allow only apps to connect remotely on port 3306

# Usage
coming soon...
