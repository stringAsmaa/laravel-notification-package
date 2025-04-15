# Laravel Notification Package

A custom Laravel package to send email notifications easily using jobs and mailable classes.

## 📦 Installation

You can install the package via composer:

```bash
composer require asmaa/notification

You can dispatch a test mail like this:

use Asmaa\Notification\Jobs\SendTestMailJob;

SendTestMailJob::dispatch('user@example.com');

Make sure you configure your mail settings in .env.

then run:
php artisan queue:work

