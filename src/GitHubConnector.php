<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk;

use Oneduo\GitHubSdk\Resource\Actions;
use Oneduo\GitHubSdk\Resource\Activity;
use Oneduo\GitHubSdk\Resource\Apps;
use Oneduo\GitHubSdk\Resource\Billing;
use Oneduo\GitHubSdk\Resource\Campaigns;
use Oneduo\GitHubSdk\Resource\Checks;
use Oneduo\GitHubSdk\Resource\Classroom;
use Oneduo\GitHubSdk\Resource\CodeScanning;
use Oneduo\GitHubSdk\Resource\CodeSecurity;
use Oneduo\GitHubSdk\Resource\CodesOfConduct;
use Oneduo\GitHubSdk\Resource\Codespaces;
use Oneduo\GitHubSdk\Resource\Copilot;
use Oneduo\GitHubSdk\Resource\Credentials;
use Oneduo\GitHubSdk\Resource\Dependabot;
use Oneduo\GitHubSdk\Resource\DependencyGraph;
use Oneduo\GitHubSdk\Resource\Emojis;
use Oneduo\GitHubSdk\Resource\Gists;
use Oneduo\GitHubSdk\Resource\Git;
use Oneduo\GitHubSdk\Resource\Gitignore;
use Oneduo\GitHubSdk\Resource\HostedCompute;
use Oneduo\GitHubSdk\Resource\Interactions;
use Oneduo\GitHubSdk\Resource\Issues;
use Oneduo\GitHubSdk\Resource\Licenses;
use Oneduo\GitHubSdk\Resource\Markdown;
use Oneduo\GitHubSdk\Resource\Meta;
use Oneduo\GitHubSdk\Resource\Migrations;
use Oneduo\GitHubSdk\Resource\Oidc;
use Oneduo\GitHubSdk\Resource\Orgs;
use Oneduo\GitHubSdk\Resource\Packages;
use Oneduo\GitHubSdk\Resource\PrivateRegistries;
use Oneduo\GitHubSdk\Resource\Projects;
use Oneduo\GitHubSdk\Resource\Pulls;
use Oneduo\GitHubSdk\Resource\RateLimit;
use Oneduo\GitHubSdk\Resource\Reactions;
use Oneduo\GitHubSdk\Resource\Repos;
use Oneduo\GitHubSdk\Resource\Search;
use Oneduo\GitHubSdk\Resource\SecretScanning;
use Oneduo\GitHubSdk\Resource\SecurityAdvisories;
use Oneduo\GitHubSdk\Resource\Teams;
use Oneduo\GitHubSdk\Resource\Users;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

/**
 * GitHub v3 REST API
 *
 * GitHub's v3 REST API.
 */
class GitHubConnector extends Connector {
    use AlwaysThrowOnErrors;

    public function resolveBaseUrl(): string {
        return 'https://api.github.com';
    }

    public function actions(): Actions {
        return new Actions($this);
    }

    public function activity(): Activity {
        return new Activity($this);
    }

    public function apps(): Apps {
        return new Apps($this);
    }

    public function billing(): Billing {
        return new Billing($this);
    }

    public function campaigns(): Campaigns {
        return new Campaigns($this);
    }

    public function checks(): Checks {
        return new Checks($this);
    }

    public function classroom(): Classroom {
        return new Classroom($this);
    }

    public function codeScanning(): CodeScanning {
        return new CodeScanning($this);
    }

    public function codeSecurity(): CodeSecurity {
        return new CodeSecurity($this);
    }

    public function codesOfConduct(): CodesOfConduct {
        return new CodesOfConduct($this);
    }

    public function codespaces(): Codespaces {
        return new Codespaces($this);
    }

    public function copilot(): Copilot {
        return new Copilot($this);
    }

    public function credentials(): Credentials {
        return new Credentials($this);
    }

    public function dependabot(): Dependabot {
        return new Dependabot($this);
    }

    public function dependencyGraph(): DependencyGraph {
        return new DependencyGraph($this);
    }

    public function emojis(): Emojis {
        return new Emojis($this);
    }

    public function gists(): Gists {
        return new Gists($this);
    }

    public function git(): Git {
        return new Git($this);
    }

    public function gitignore(): Gitignore {
        return new Gitignore($this);
    }

    public function hostedCompute(): HostedCompute {
        return new HostedCompute($this);
    }

    public function interactions(): Interactions {
        return new Interactions($this);
    }

    public function issues(): Issues {
        return new Issues($this);
    }

    public function licenses(): Licenses {
        return new Licenses($this);
    }

    public function markdown(): Markdown {
        return new Markdown($this);
    }

    public function meta(): Meta {
        return new Meta($this);
    }

    public function migrations(): Migrations {
        return new Migrations($this);
    }

    public function oidc(): Oidc {
        return new Oidc($this);
    }

    public function orgs(): Orgs {
        return new Orgs($this);
    }

    public function packages(): Packages {
        return new Packages($this);
    }

    public function privateRegistries(): PrivateRegistries {
        return new PrivateRegistries($this);
    }

    public function projects(): Projects {
        return new Projects($this);
    }

    public function pulls(): Pulls {
        return new Pulls($this);
    }

    public function rateLimit(): RateLimit {
        return new RateLimit($this);
    }

    public function reactions(): Reactions {
        return new Reactions($this);
    }

    public function repos(): Repos {
        return new Repos($this);
    }

    public function search(): Search {
        return new Search($this);
    }

    public function secretScanning(): SecretScanning {
        return new SecretScanning($this);
    }

    public function securityAdvisories(): SecurityAdvisories {
        return new SecurityAdvisories($this);
    }

    public function teams(): Teams {
        return new Teams($this);
    }

    public function users(): Users {
        return new Users($this);
    }
}
