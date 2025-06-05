<?php

declare(strict_types=1);

use Oneduo\GitHubSdk\GitHubConnector;

it('retrieves dummy repository', function () {
    $connector = new GitHubConnector();

    $response = $connector->repos()->get('octocat', 'hello-world');

    expect($response->status())->toBe(200);
});

it('retrieves dummy user', function () {
    $connector = new GitHubConnector();

    $response = $connector->users()->getByUsername('octocat');

    expect($response->status())->toBe(200);
});

it('retrieves dummy organization', function () {
    $connector = new GitHubConnector();

    $response = $connector->orgs()->get('github');

    expect($response->status())->toBe(200);
});

it('retrieves events', function() {
    $connector = new GitHubConnector();

    $response = $connector->repos()->listReleases('laravel', 'laravel', 1);


    dd($response->json());
    expect($response->status())->toBe(200);
});