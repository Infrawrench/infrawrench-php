<?php

/*
 * infrawrench/sdk v0.1.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.1.1).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk;

use Infrawrench\Sdk\Api\AccountsNamespace;
use Infrawrench\Sdk\Api\AgentsNamespace;
use Infrawrench\Sdk\Api\ApiKeysNamespace;
use Infrawrench\Sdk\Api\ArtifactsNamespace;
use Infrawrench\Sdk\Api\AssociationsNamespace;
use Infrawrench\Sdk\Api\AuditLogsNamespace;
use Infrawrench\Sdk\Api\AuthNamespace;
use Infrawrench\Sdk\Api\BastionsNamespace;
use Infrawrench\Sdk\Api\BillingNamespace;
use Infrawrench\Sdk\Api\BudgetsNamespace;
use Infrawrench\Sdk\Api\ConnectNamespace;
use Infrawrench\Sdk\Api\CostsNamespace;
use Infrawrench\Sdk\Api\DashboardsNamespace;
use Infrawrench\Sdk\Api\DockerNamespace;
use Infrawrench\Sdk\Api\InvitationsNamespace;
use Infrawrench\Sdk\Api\KvNamespace;
use Infrawrench\Sdk\Api\OrgsNamespace;
use Infrawrench\Sdk\Api\ProfileNamespace;
use Infrawrench\Sdk\Api\ResourcesNamespace;
use Infrawrench\Sdk\Api\SearchNamespace;
use Infrawrench\Sdk\Api\SftpNamespace;
use Infrawrench\Sdk\Api\SqlNamespace;
use Infrawrench\Sdk\Api\SshKeysNamespace;
use Infrawrench\Sdk\Api\SshTunnelsNamespace;
use Infrawrench\Sdk\Api\StorageNamespace;
use Infrawrench\Sdk\Api\TeamNamespace;
use Infrawrench\Sdk\Http\HttpSender;
use Infrawrench\Sdk\Internal\Transport;

/**
 * A client for the Infrawrench API.
 *
 * ```php
 * $client = new APIV1Client(apiKey: getenv('INFRAWRENCH_API_KEY') ?: null, orgId: $orgId);
 * $accounts = $client->accounts->list();
 * ```
 *
 * Namespaces hang off plain readonly properties rather than a `__get` shim. A typo in
 * `$client->acounts->list()` is then a static-analysis error instead of a runtime one, and an
 * editor can complete the tree, which `__get` cannot offer at any price. The cost is one small
 * object per namespace, built once per client.
 */
final class APIV1Client
{
    /**
     * Shared request plumbing.
     *
     * Public so a caller can read the resolved base URL, but not part of the stable surface.
     */
    public readonly Transport $transport;

    /** `$client->accounts` */
    public readonly AccountsNamespace $accounts;

    /** `$client->agents` */
    public readonly AgentsNamespace $agents;

    /** `$client->apiKeys` */
    public readonly ApiKeysNamespace $apiKeys;

    /** `$client->artifacts` */
    public readonly ArtifactsNamespace $artifacts;

    /** `$client->associations` */
    public readonly AssociationsNamespace $associations;

    /** `$client->auditLogs` */
    public readonly AuditLogsNamespace $auditLogs;

    /** `$client->auth` */
    public readonly AuthNamespace $auth;

    /** `$client->bastions` */
    public readonly BastionsNamespace $bastions;

    /** `$client->billing` */
    public readonly BillingNamespace $billing;

    /** `$client->budgets` */
    public readonly BudgetsNamespace $budgets;

    /** `$client->connect` */
    public readonly ConnectNamespace $connect;

    /** `$client->costs` */
    public readonly CostsNamespace $costs;

    /** `$client->dashboards` */
    public readonly DashboardsNamespace $dashboards;

    /** `$client->docker` */
    public readonly DockerNamespace $docker;

    /** `$client->invitations` */
    public readonly InvitationsNamespace $invitations;

    /** `$client->kv` */
    public readonly KvNamespace $kv;

    /** `$client->orgs` */
    public readonly OrgsNamespace $orgs;

    /** `$client->profile` */
    public readonly ProfileNamespace $profile;

    /** `$client->resources` */
    public readonly ResourcesNamespace $resources;

    /** `$client->search` */
    public readonly SearchNamespace $search;

    /** `$client->sftp` */
    public readonly SftpNamespace $sftp;

    /** `$client->sql` */
    public readonly SqlNamespace $sql;

    /** `$client->sshKeys` */
    public readonly SshKeysNamespace $sshKeys;

    /** `$client->sshTunnels` */
    public readonly SshTunnelsNamespace $sshTunnels;

    /** `$client->storage` */
    public readonly StorageNamespace $storage;

    /** `$client->team` */
    public readonly TeamNamespace $team;

    /**
     * @param string|null $apiKey API key or access token, sent as `Authorization: Bearer …`.
     * @param string|null $orgId Default organization id. Every org-scoped call accepts `orgId:`; set it once here and leave it off the call sites.
     * @param string|null $baseUrl Deployment to talk to. Defaults to `https://app.infrawrench.com`.
     * @param array<string, string> $headers Merged into every request; per-call headers win.
     * @param float|null $timeout Seconds to wait per request. No limit by default.
     * @param HttpSender|null $sender Replaces the HTTP layer — for proxies, or for tests.
     */
    public function __construct(
        ?string $apiKey = null,
        ?string $orgId = null,
        ?string $baseUrl = null,
        array $headers = [],
        ?float $timeout = null,
        ?HttpSender $sender = null,
    ) {
        $this->transport = new Transport(
            $apiKey,
            $orgId,
            $baseUrl,
            $headers,
            $timeout,
            $sender,
        );
        $this->accounts = new AccountsNamespace($this->transport);
        $this->agents = new AgentsNamespace($this->transport);
        $this->apiKeys = new ApiKeysNamespace($this->transport);
        $this->artifacts = new ArtifactsNamespace($this->transport);
        $this->associations = new AssociationsNamespace($this->transport);
        $this->auditLogs = new AuditLogsNamespace($this->transport);
        $this->auth = new AuthNamespace($this->transport);
        $this->bastions = new BastionsNamespace($this->transport);
        $this->billing = new BillingNamespace($this->transport);
        $this->budgets = new BudgetsNamespace($this->transport);
        $this->connect = new ConnectNamespace($this->transport);
        $this->costs = new CostsNamespace($this->transport);
        $this->dashboards = new DashboardsNamespace($this->transport);
        $this->docker = new DockerNamespace($this->transport);
        $this->invitations = new InvitationsNamespace($this->transport);
        $this->kv = new KvNamespace($this->transport);
        $this->orgs = new OrgsNamespace($this->transport);
        $this->profile = new ProfileNamespace($this->transport);
        $this->resources = new ResourcesNamespace($this->transport);
        $this->search = new SearchNamespace($this->transport);
        $this->sftp = new SftpNamespace($this->transport);
        $this->sql = new SqlNamespace($this->transport);
        $this->sshKeys = new SshKeysNamespace($this->transport);
        $this->sshTunnels = new SshTunnelsNamespace($this->transport);
        $this->storage = new StorageNamespace($this->transport);
        $this->team = new TeamNamespace($this->transport);
    }
}
