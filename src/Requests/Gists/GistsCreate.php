<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Gists;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * gists/create
 *
 * Allows you to add a new gist with one or more files.
 *
 * > [!NOTE]
 * > Don't name your files "gistfile"
 * with a numerical suffix. This is the format of the automatic naming scheme that Gist uses
 * internally.
 */
class GistsCreate extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return '/gists';
    }

    public function __construct() {}
}
