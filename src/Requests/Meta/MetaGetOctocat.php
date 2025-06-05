<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Meta;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * meta/get-octocat
 *
 * Get the octocat as ASCII art
 */
class MetaGetOctocat extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/octocat';
    }

    /**
     * @param  null|string  $s  The words to show in Octocat's speech bubble
     */
    public function __construct(
        protected ?string $s = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['s' => $this->s]);
    }
}
