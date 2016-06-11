# Speedfreak Server

Speedfreak is a new server for Need For Speed World, written in PHP. It is effectively a port of [nilzao/soapbox-race](https://github.com/nilzao/soapbox-race), however this is unique in quite a few ways:
- A sort of modular system: there's the server, the chat server, and the UDP server that currently does not exist.
- The web-app handles the database and stuff, as well as an API. The web-app does not handle chat at all; that is up to the Java chat server.
- There is a special launcher, which allows players to add their own servers to play on. In the future, there will _**probably**_ be a server list site. The launcher also has some preset servers.

## Setup

### Prerequisites
Before you can begin using the server, please ensure that you have the following things installed:

- [Memcached](https://memcached.org)
- PHP >=7.0.0, compiled with XML, MySQL, curl
- The PHP 7 memcached extension
- The PHP 7 mcrypt extension
- [Composer](https://getcomposer.org)
- [Homebrew](http://brew.sh) **(ONLY if you're running the server on a Mac; it makes installing PHP and stuff MUCH easier)**

### Installing 
To install the server, you should run the following command:
```composer create-project speedfreak/server```

This will create a new project with the server code. If you get any errors, you probably did something wrong. [Here](https://getcomposer.org/doc/articles/troubleshooting.md) is a guide that may help you.

After that completes, change your current directory to that of the server by running:
```cd SERVER_DIRECTORY_NAME```

Basic information about the server can be found in the `.env` file, towards the bottom. It should be fairly straightforward.

** more coming soon **

## License

The Speedfreak server is open-sourced software licensed under the [GPL v3.0 license](https://opensource.org/licenses/GPL-3.0).
