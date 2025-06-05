<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityAttachConfiguration;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityAttachEnterpriseConfiguration;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityCreateConfiguration;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityCreateConfigurationForEnterprise;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityDeleteConfiguration;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityDeleteConfigurationForEnterprise;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityDetachConfiguration;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityGetConfiguration;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityGetConfigurationForRepository;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityGetConfigurationsForEnterprise;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityGetConfigurationsForOrg;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityGetDefaultConfigurations;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityGetDefaultConfigurationsForEnterprise;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityGetRepositoriesForConfiguration;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityGetRepositoriesForEnterpriseConfiguration;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityGetSingleConfigurationForEnterprise;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecuritySetConfigurationAsDefault;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecuritySetConfigurationAsDefaultForEnterprise;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityUpdateConfiguration;
use Oneduo\GitHubSdk\Requests\CodeSecurity\CodeSecurityUpdateEnterpriseConfiguration;
use Saloon\Http\Response;

class CodeSecurity extends GitHubResource {
    /**
     * @param  string  $enterprise  The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     * @param  string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function getConfigurationsForEnterprise(string $enterprise, ?string $before): Response {
        return $this->connector->send(new CodeSecurityGetConfigurationsForEnterprise($enterprise, $before));
    }

    /**
     * @param  string  $enterprise  The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     */
    public function createConfigurationForEnterprise(string $enterprise): Response {
        return $this->connector->send(new CodeSecurityCreateConfigurationForEnterprise($enterprise));
    }

    /**
     * @param  string  $enterprise  The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     */
    public function getDefaultConfigurationsForEnterprise(string $enterprise): Response {
        return $this->connector->send(new CodeSecurityGetDefaultConfigurationsForEnterprise($enterprise));
    }

    /**
     * @param  string  $enterprise  The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     * @param  int  $configurationId  The unique identifier of the code security configuration.
     */
    public function getSingleConfigurationForEnterprise(string $enterprise, int $configurationId): Response {
        return $this->connector->send(new CodeSecurityGetSingleConfigurationForEnterprise($enterprise, $configurationId));
    }

    /**
     * @param  string  $enterprise  The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     * @param  int  $configurationId  The unique identifier of the code security configuration.
     */
    public function deleteConfigurationForEnterprise(string $enterprise, int $configurationId): Response {
        return $this->connector->send(new CodeSecurityDeleteConfigurationForEnterprise($enterprise, $configurationId));
    }

    /**
     * @param  string  $enterprise  The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     * @param  int  $configurationId  The unique identifier of the code security configuration.
     */
    public function updateEnterpriseConfiguration(string $enterprise, int $configurationId): Response {
        return $this->connector->send(new CodeSecurityUpdateEnterpriseConfiguration($enterprise, $configurationId));
    }

    /**
     * @param  string  $enterprise  The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     * @param  int  $configurationId  The unique identifier of the code security configuration.
     */
    public function attachEnterpriseConfiguration(string $enterprise, int $configurationId): Response {
        return $this->connector->send(new CodeSecurityAttachEnterpriseConfiguration($enterprise, $configurationId));
    }

    /**
     * @param  string  $enterprise  The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     * @param  int  $configurationId  The unique identifier of the code security configuration.
     */
    public function setConfigurationAsDefaultForEnterprise(
        string $enterprise,
        int $configurationId,
    ): Response {
        return $this->connector->send(new CodeSecuritySetConfigurationAsDefaultForEnterprise($enterprise, $configurationId));
    }

    /**
     * @param  string  $enterprise  The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     * @param  int  $configurationId  The unique identifier of the code security configuration.
     * @param  string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $status  A comma-separated list of statuses. If specified, only repositories with these attachment statuses will be returned.
     *
     * Can be: `all`, `attached`, `attaching`, `removed`, `enforced`, `failed`, `updating`, `removed_by_enterprise`
     */
    public function getRepositoriesForEnterpriseConfiguration(
        string $enterprise,
        int $configurationId,
        ?string $before,
        ?string $status,
    ): Response {
        return $this->connector->send(new CodeSecurityGetRepositoriesForEnterpriseConfiguration($enterprise, $configurationId, $before, $status));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $targetType  The target type of the code security configuration
     * @param  string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function getConfigurationsForOrg(string $org, ?string $targetType, ?string $before): Response {
        return $this->connector->send(new CodeSecurityGetConfigurationsForOrg($org, $targetType, $before));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function createConfiguration(string $org): Response {
        return $this->connector->send(new CodeSecurityCreateConfiguration($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getDefaultConfigurations(string $org): Response {
        return $this->connector->send(new CodeSecurityGetDefaultConfigurations($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function detachConfiguration(string $org): Response {
        return $this->connector->send(new CodeSecurityDetachConfiguration($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $configurationId  The unique identifier of the code security configuration.
     */
    public function getConfiguration(string $org, int $configurationId): Response {
        return $this->connector->send(new CodeSecurityGetConfiguration($org, $configurationId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $configurationId  The unique identifier of the code security configuration.
     */
    public function deleteConfiguration(string $org, int $configurationId): Response {
        return $this->connector->send(new CodeSecurityDeleteConfiguration($org, $configurationId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $configurationId  The unique identifier of the code security configuration.
     */
    public function updateConfiguration(string $org, int $configurationId): Response {
        return $this->connector->send(new CodeSecurityUpdateConfiguration($org, $configurationId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $configurationId  The unique identifier of the code security configuration.
     */
    public function attachConfiguration(string $org, int $configurationId): Response {
        return $this->connector->send(new CodeSecurityAttachConfiguration($org, $configurationId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $configurationId  The unique identifier of the code security configuration.
     */
    public function setConfigurationAsDefault(string $org, int $configurationId): Response {
        return $this->connector->send(new CodeSecuritySetConfigurationAsDefault($org, $configurationId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $configurationId  The unique identifier of the code security configuration.
     * @param  string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $status  A comma-separated list of statuses. If specified, only repositories with these attachment statuses will be returned.
     *
     * Can be: `all`, `attached`, `attaching`, `detached`, `removed`, `enforced`, `failed`, `updating`, `removed_by_enterprise`
     */
    public function getRepositoriesForConfiguration(
        string $org,
        int $configurationId,
        ?string $before,
        ?string $status,
    ): Response {
        return $this->connector->send(new CodeSecurityGetRepositoriesForConfiguration($org, $configurationId, $before, $status));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getConfigurationForRepository(string $owner, string $repo): Response {
        return $this->connector->send(new CodeSecurityGetConfigurationForRepository($owner, $repo));
    }
}
