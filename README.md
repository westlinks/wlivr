# Simple IVR for WLHM

An Interactive Voice Response (IVR) extension package designed for the **WLHM (Westlinks Helpline Manager)** application and adaptable to other Laravel applications requiring dynamic call routing.

## Overview

`westlinks/simple-ivr` intercepts incoming phone calls and presents callers with an IVR menu. Callers are prompted to press a keypad option, which routes the call to phone numbers defined in the application's database.

### Key Features

* **Interactive Voice Menu:** Plays custom audio prompts and captures DTMF keypad inputs.
* **Database-Driven Routing:** Maps menu selections to active schedules and call routes stored in your database.
* **Shift Fallback:** If no selection is made after a configurable timeout, the call automatically rolls to the first available on-shift staff member.
* **Voicemail Failover:** Automatically transfers calls to voicemail if no staff member answers.
* **Use Case:** Primarily built for nonprofit 12-step helplines, but extensible to any organization that needs to forward inbound calls to live personnel based on real-time shift schedules.

---

## Installation

Because this package is distributed directly via local path/repository rather than Packagist, register it locally in your main application's `composer.json`:

```json
"repositories": [
    {
        "type": "path",
        "url": "public_html"
    }
]

```

Then add the requirement via Composer:

```bash
composer require westlinks/simple-ivr

```

---

## Usage

Once installed, publish the package assets, migrations, and configuration (if required by your application setup):

```bash
php artisan vendor:publish --provider="Westlinks\SimpleIvr\SimpleIvrServiceProvider"

```

Configure your telephony service (e.g., Twilio, SignalWire) webhook URL to point to the simple-ivr entry point endpoint defined in your routes.

---

## Testing

Run the test suite using Composer:

```bash
composer test

```

---

## Contributing

Please see [CONTRIBUTING](https://www.google.com/search?q=CONTRIBUTING.md) for details.

### Security

If you discover any security-related issues, please use the repository issue tracker.

---

## Credits

* [Westlinks Online](https://github.com/westlinks)
* [All Contributors](https://www.google.com/search?q=../../contributors)

---

## License

The MIT License (MIT). Please see [LICENSE.md](https://www.google.com/search?q=LICENSE.md) for more information.

```

<ElicitationsGroup message="Would you like assistance with any further documentation updates?">
  <Elicitation label="Draft inline code examples for installation" query="Can you help write example code for publishing config files or setting up webhooks for Twilio in this package?"/>
  <Elicitation label="Update repository path references" query="Does the local repository path in composer.json need to be simple-ivr or public_html depending on deployment?"/>
</ElicitationsGroup>