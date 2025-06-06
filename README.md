# GitHub SDK for PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/oneduo/github-sdk-php.svg?style=flat-square)](https://packagist.org/packages/oneduo/github-sdk-php)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/oneduo/github-sdk-php/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/oneduo/github-sdk-php/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/oneduo/github-sdk-php/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/oneduo/github-sdk-php/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/oneduo/github-sdk-php.svg?style=flat-square)](https://packagist.org/packages/oneduo/github-sdk-php)

A fully typed, modern PHP client for the [GitHub REST API v3](https://docs.github.com/en/rest), built on top
of [Saloon](https://docs.saloon.dev/). This SDK provides a clean, intuitive, and fluent interface for interacting with
all GitHub API endpoints, leveraging Saloon's powerful features for authentication, request building, and extensibility.

## Installation

Install via Composer:

```bash
composer require oneduo/github-sdk-php
```

## Documentation

- **GitHub REST API:** [https://docs.github.com/en/rest](https://docs.github.com/en/rest)
- **Saloon Documentation:** [https://docs.saloon.dev/](https://docs.saloon.dev/)

## Basic Usage

### Initialize the Connector

```php
use Oneduo\GitHubSdk\GitHubConnector;

$github = new GitHubConnector();
```

### Example: Fetch a Public Repository (No Authentication Required)

```php
$response = $github->repos()->get('octocat', 'hello-world');
$repository = $response->json();
```

### Example: List Public Users (No Authentication Required)

```php
$response = $github->users()->list();
$users = $response->json();
```

### Example: Get User Information (No Authentication Required)

```php
$response = $github->users()->getByUsername('octocat');
$user = $response->json();
```

## Authentication

This SDK supports the most common authentication methods for the GitHub API using Saloon authenticators:

### Bearer Token Authentication (Recommended for GitHub)

The `TokenAuthenticator` class adds an `Authorization: Bearer` header to requests:

```php
use Saloon\Http\Auth\TokenAuthenticator;

$github = new GitHubConnector();
$github->authenticate(new TokenAuthenticator('your-github-token'));

// Now you can access authenticated endpoints
$response = $github->users()->getAuthenticated();
$user = $response->json();
```

### Basic Auth (Base64 Encoded)

```php
use Saloon\Http\Auth\BasicAuthenticator;

$github = new GitHubConnector();
$github->authenticate(new BasicAuthenticator('your-username', 'your-password'));

// Now you can access authenticated endpoints
$response = $github->users()->getAuthenticated();
$user = $response->json();
```

### GitHub App Authentication

For GitHub Apps, you can use the included `AppAuthenticator` that generates JWT tokens:

```php
use Oneduo\GitHubSdk\Authenticators\AppAuthenticator;

// Using a private key file path
$github = new GitHubConnector();
$github->authenticate(new AppAuthenticator(
    appId: 'your-app-id',
    key: '/path/to/your/private-key.pem'
));

// Or using key content directly  
$github = new GitHubConnector();
$github->authenticate(new AppAuthenticator(
    appId: 'your-app-id',
    key: '-----BEGIN RSA PRIVATE KEY-----...'
));

// With passphrase if your key is encrypted
$github = new GitHubConnector();
$github->authenticate(new AppAuthenticator(
    appId: 'your-app-id',
    key: '/path/to/your/private-key.pem',
    passphrase: 'your-passphrase'
));

// Using an existing OpenSSLAsymmetricKey resource (PHP 8.0+)
$keyResource = openssl_pkey_get_private(file_get_contents('/path/to/key.pem'));
$github = new GitHubConnector();
$github->authenticate(new AppAuthenticator(
    appId: 'your-app-id',
    key: $keyResource
));

// Now you can access GitHub App endpoints
$response = $github->apps()->getAuthenticated();
$app = $response->json();
```

The `AppAuthenticator` supports:
- **File paths**: String path to your private key file
- **Key content**: Raw private key content as a string
- **OpenSSL resources**: `OpenSSLAsymmetricKey` objects (PHP 8.0+)
- **Passphrases**: Optional encryption passphrase for protected keys
```

For more authentication strategies (query, certificate, header, multiple, custom, etc.), see
the [Saloon Authentication Documentation](https://docs.saloon.dev/the-basics/authentication).

## Advanced Usage

### Example: List Repositories for an Organization

```php
$github->authenticate(new TokenAuthenticator('your-github-token'));
$response = $github->repos()->listForOrg('oneduo');
$repos = $response->json();
```

### Example: Create a Repository (Authenticated)

```php
$github->authenticate(new TokenAuthenticator('your-github-token'));
$response = $github->repos()->createForAuthenticatedUser([
    'name' => 'my-new-repo',
    'private' => true,
]);
$newRepo = $response->json();
```

## Custom Requests

You can send custom requests using Saloon's request system. For example, to call an undocumented or custom endpoint:

```php
use Saloon\Http\Request;
use Saloon\Enums\Method;

class MyCustomRequest extends Request {
    protected Method $method = Method::GET;
    
    public function resolveEndpoint(): string {
        return '/rate_limit';
    }
}

$response = $github->send(new MyCustomRequest());
$data = $response->json();
```

> **Tip:** Explore [Saloon's documentation](https://docs.saloon.dev/) for more on custom requests, plugins, and advanced
> features.

## More Examples

- [GitHub REST API Reference](https://docs.github.com/en/rest)
- [Saloon Usage Examples](https://docs.saloon.dev/)

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Contributions are welcome! Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Charaf Rezrazi](https://github.com/Rezrazi)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
