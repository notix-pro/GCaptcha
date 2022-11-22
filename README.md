# GCaptcha

[![Latest Stable Version](http://poser.pugx.org/notix/gcaptcha/v)](https://packagist.org/packages/notix/gcaptcha)
[![Total Downloads](http://poser.pugx.org/notix/gcaptcha/downloads)](https://packagist.org/packages/notix/gcaptcha)
[![Monthly Downloads](http://poser.pugx.org/notix/gcaptcha/d/monthly)](https://packagist.org/packages/notix/gcaptcha)
[![License](http://poser.pugx.org/notix/gcaptcha/license)](https://packagist.org/packages/notix/gcaptcha)

## Instalation

```php
composer require notix/gcaptcha
```

## Configuration

Add `CAPTCHA_SECRET`, `CAPTCHA_SITEKEY` optionally `CAPTCHA_THEME` (default light)

```
CAPTCHA_SECRET=
CAPTCHA_SITEKEY=
#Optionally default is light theme.
CAPTCHA_THEME=
```

You can take the private key as well as the public key from this [link](https://www.google.com/recaptcha/admin))

## Publish Config

```php
php artisan vendor:publish --provider="Notix\GCaptcha\CaptchaServiceProvider"
```

## Usage

### Render captcha in `'.blade.php'`

```php
{!! app('captcha')->display() !!}
```

### Validation

Add `'g-recaptcha-response' => 'required|captcha'` to rules array.
<br><br>
Or make custom messages..<br>
Add this value to the `'custom'` array in the `'validation'` language file.<br>
(Your laravel project > `'lang'` > `'en'` (or other language folder) > `'validation.php'`)

```php
'custom' => [
    'g-recaptcha-response' => [
        'required' => 'Please confirm that you are not a robot.',
        'captcha' => 'There was a problem with captcha verification, please wait or contact the administrator.',
    ],
],
```

### Display

To display error messages you can use the standard option where all errors are displayed together. ([laravel docs](https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors))

```php
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

Or if you want to show errors directly above or below the captcha

```php
@if($errors->has('g-recaptcha-response'))
    <div class="alert alert-danger">
        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
    </div>
@endif
```
