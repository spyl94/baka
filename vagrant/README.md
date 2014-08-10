Installation
========================

Ensure you have the following tools installed on your computer:

 - Vagrant (http://vagrantup.com)
 - VirtualBox (http://www.virtualbox.org)

# Description
This configuration includes following software:

* PHP 5.5 
* MySQL
* GIT
* Apache
* Vim
* Curl
* Composer
* Elastic Search
* RabbitMQ
* Node.js
* Bower, Grunt, Gulp
* Sass and Compass

# Usage

First you need to create vagrant VM

```
$ cd vagrant
$ vagrant up
```

While waiting for Vagrant to start up, you should add an entry into hosts file on the host machine.

```
192.168.56.101      sandbox.dev
```

Windows users could look here: 
```
c:\windows\system32\drivers\etc\hosts
```

Linux and Mac OSX users could look here: 
```
/etc/hosts.
```

From now you should be able to access the project at [http://sandbox.dev/](http://sandbox.dev/)

To access VM simply run:

```
vagrant ssh
cd /var/www
```

# Troubleshooting

Using Symfony2 inside Vagrant can be slow due to synchronisation delay incurred by NFS. To avoid this, both locations have been moved to a shared memory segment under ``/tmp``.

To view the application logs, run the following commands:

```bash
$ tail -f /tmp/logs/prod.log
$ tail -f /tmp/logs/dev.log
```
