# Mailchimp API V3 API Wrapper for Laravel 4


* [Installation](#installation)
* [Usage](#usage)
    * [Pagination](#pagination)
    * [Filtering](#filtering)
    * [Partial Response](#partial-response)
    * [Behind Proxy](#behind-proxy)
* [Examples](#examples)
    * [Collection object](#collection-object)
    * [Create lists](#create-lists)
    * [Subresources](#subresources)
    * [Proxy](#proxy)
* [Further documentation](#further-documentation)


# Installation
Add the following to your composer.json

```json
{
    "require": {
        "asanzred/mailchimpv3": "dev-master"
    }
}
```

Add ServiceProvider in your `app.php` config file.

```php
// config/app.php
'providers' => [
    ...
    'Asanzred\Mailchimpv3\Mailchimpv3ServiceProvider'
]
```

and instead on aliases

```php
// config/app.php
'aliases' => [
    ...
    'Mailchimpv3' => 'Asanzred\Mailchimpv3\Facades\Mailchimpv3'
]
```

#### Configuration
Publish the config by running:

    php artisan config:publish asanzred/mailchimpv3

Now, the config file will be located under `config/asanzred/mailchimpv3/config.php`:

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mailchimp API key
    |--------------------------------------------------------------------------
    |
    | To obtain an API key, go to mailchimp.com under your profile
    | you will find Extras -> API keys. Paste the key below.
    |
    */
    'apikey' => ''
];
```

# Usage
There's only one method:

```php
request($resource, $arguments = [], $method = 'GET') 
```

You can make these calls if needed

```php
get($resource, array $options = [])
head($resource, array $options = [])
put($resource, array $options = [])
post($resource, array $options = [])
patch($resource, array $options = [])
delete($resource, array $options = [])
```

### Pagination
_We use `offset` and `count` in the query string to paginate data, because it provides greater control over how you view your data. Offset defaults to 0, so if you use offset=1, you'll miss the first element in the dataset. Count defaults to 10._

Source: http://kb.mailchimp.com/api/article/api-3-overview

### Filtering
_Most endpoints don't currently support filtering, but we plan to add these capabilities over time. Schemas will tell you which collections can be filtered, and what to include in your query string._

Source: http://kb.mailchimp.com/api/article/api-3-overview

### Partial Response
_To cut down on data transfers, pass a comma separated list of fields to include or exclude from a certain response in the query string. The parameters `fields` and `exclude_fields` are mutually exclusive and will throw an error if a field isn't valid in your request._

Source: http://kb.mailchimp.com/api/article/api-3-overview

### Behind Proxy
If you are behind a proxy, you can use `setProxy` directly on the class. 

`setProxy(host : string, port : int, [ssl : bool = false], [username = null], [password = null]);`


# Examples

### Collection object
All queries will return an instance of the [Illuminate\Support\Collection](http://laravel.com/api/master/Illuminate/Support/Collection.html) object, which is really easy to work with. If you don't want to use the Collection object however, you can transform it into an array using `$result->toArray()`.

```php

$resource = '/lists/'

$result = Mailchimpv3::request($resource, $opts,'GET');

// Returns object(Illuminate\Support\Collection)
var_dump($result);

// Returns the first item
var_dump($result->first());

// Returns 3 items
var_dump($result->take(3));

// Returns a JSON string
var_dump($result->toJson());

// Returns an array
var_dump($result->toArray());
```
