# davwheat Session Keep-alive

![License](https://img.shields.io/badge/license-MIT-blue.svg) [![Latest Stable Version](https://img.shields.io/packagist/v/davwheat/session-keepalive.svg)](https://packagist.org/packages/davwheat/session-keepalive) [![Total Downloads](https://img.shields.io/packagist/dt/davwheat/session-keepalive.svg)](https://packagist.org/packages/davwheat/session-keepalive)

A [Flarum](http://flarum.org) extension. Prevents session timeouts during idle by pinging home at set intervals.

Ping intervals are determined by the session lifetime in Illuminate. In Flarum, this defaults to 2 hours. Pings are done at 4 points within that lifetime to increase the chances of a successful keep-alive.

This means that, by default with this extension, the forum will ping home every 30 minutes to keep your session alive.

## Installation

Install with composer:

```sh
composer require davwheat/session-keepalive:"*"
```

## Updating

```sh
composer update davwheat/session-keepalive:"*"
php flarum migrate
php flarum cache:clear
```

## Links

- [Packagist](https://packagist.org/packages/davwheat/session-keepalive)
- [GitHub](https://github.com/davwheat/flarum-session-keepalive)
- [Discuss](https://discuss.flarum.org/d/PUT_DISCUSS_SLUG_HERE)
