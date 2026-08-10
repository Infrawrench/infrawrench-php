<?php

/*
 * infrawrench/sdk v1.4.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.4.0).
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

use Infrawrench\Sdk\Api\AccessRequestsNamespace;
use Infrawrench\Sdk\Api\AccountsNamespace;
use Infrawrench\Sdk\Api\AgentsNamespace;
use Infrawrench\Sdk\Api\AlertRulesNamespace;
use Infrawrench\Sdk\Api\ApiKeysNamespace;
use Infrawrench\Sdk\Api\ArtifactsNamespace;
use Infrawrench\Sdk\Api\AssociationsNamespace;
use Infrawrench\Sdk\Api\AuditLogsNamespace;
use Infrawrench\Sdk\Api\AuthNamespace;
use Infrawrench\Sdk\Api\BastionsNamespace;
use Infrawrench\Sdk\Api\BillingNamespace;
use Infrawrench\Sdk\Api\BudgetsNamespace;
use Infrawrench\Sdk\Api\ChangeFreezesNamespace;
use Infrawrench\Sdk\Api\ChangesNamespace;
use Infrawrench\Sdk\Api\ConfigNamespace;
use Infrawrench\Sdk\Api\ConnectNamespace;
use Infrawrench\Sdk\Api\CostCentresNamespace;
use Infrawrench\Sdk\Api\CostsNamespace;
use Infrawrench\Sdk\Api\CredentialHygieneNamespace;
use Infrawrench\Sdk\Api\CreditsNamespace;
use Infrawrench\Sdk\Api\CustomGraphsNamespace;
use Infrawrench\Sdk\Api\DashboardsNamespace;
use Infrawrench\Sdk\Api\DependencyGraphNamespace;
use Infrawrench\Sdk\Api\DeploymentsNamespace;
use Infrawrench\Sdk\Api\DigestNamespace;
use Infrawrench\Sdk\Api\DnsNamespace;
use Infrawrench\Sdk\Api\DockerNamespace;
use Infrawrench\Sdk\Api\EnvironmentDiffNamespace;
use Infrawrench\Sdk\Api\ExpiringNamespace;
use Infrawrench\Sdk\Api\InvitationsNamespace;
use Infrawrench\Sdk\Api\KvNamespace;
use Infrawrench\Sdk\Api\LeasesNamespace;
use Infrawrench\Sdk\Api\LogWorkspacesNamespace;
use Infrawrench\Sdk\Api\MetricAlertsNamespace;
use Infrawrench\Sdk\Api\MomentNamespace;
use Infrawrench\Sdk\Api\MsteamsNamespace;
use Infrawrench\Sdk\Api\OrgsNamespace;
use Infrawrench\Sdk\Api\OrphansNamespace;
use Infrawrench\Sdk\Api\OwnershipNamespace;
use Infrawrench\Sdk\Api\PagesNamespace;
use Infrawrench\Sdk\Api\PostureNamespace;
use Infrawrench\Sdk\Api\ProbesNamespace;
use Infrawrench\Sdk\Api\ProfileNamespace;
use Infrawrench\Sdk\Api\ResourcesNamespace;
use Infrawrench\Sdk\Api\RightsizingNamespace;
use Infrawrench\Sdk\Api\SchedulesNamespace;
use Infrawrench\Sdk\Api\SearchNamespace;
use Infrawrench\Sdk\Api\SessionRecordingsNamespace;
use Infrawrench\Sdk\Api\SftpNamespace;
use Infrawrench\Sdk\Api\SlackNamespace;
use Infrawrench\Sdk\Api\SqlNamespace;
use Infrawrench\Sdk\Api\SshFanoutNamespace;
use Infrawrench\Sdk\Api\SshKeysNamespace;
use Infrawrench\Sdk\Api\SshTunnelsNamespace;
use Infrawrench\Sdk\Api\StatusIncidentsNamespace;
use Infrawrench\Sdk\Api\StatusNamespace;
use Infrawrench\Sdk\Api\StatusPagesNamespace;
use Infrawrench\Sdk\Api\StorageNamespace;
use Infrawrench\Sdk\Api\TagPolicyNamespace;
use Infrawrench\Sdk\Api\TeamNamespace;
use Infrawrench\Sdk\Api\WorkflowApprovalsNamespace;
use Infrawrench\Sdk\Api\WorkflowsNamespace;
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

    /** `$client->accessRequests` */
    public readonly AccessRequestsNamespace $accessRequests;

    /** `$client->accounts` */
    public readonly AccountsNamespace $accounts;

    /** `$client->agents` */
    public readonly AgentsNamespace $agents;

    /** `$client->alertRules` */
    public readonly AlertRulesNamespace $alertRules;

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

    /** `$client->changeFreezes` */
    public readonly ChangeFreezesNamespace $changeFreezes;

    /** `$client->changes` */
    public readonly ChangesNamespace $changes;

    /** `$client->config` */
    public readonly ConfigNamespace $config;

    /** `$client->connect` */
    public readonly ConnectNamespace $connect;

    /** `$client->costCentres` */
    public readonly CostCentresNamespace $costCentres;

    /** `$client->costs` */
    public readonly CostsNamespace $costs;

    /** `$client->credentialHygiene` */
    public readonly CredentialHygieneNamespace $credentialHygiene;

    /** `$client->credits` */
    public readonly CreditsNamespace $credits;

    /** `$client->customGraphs` */
    public readonly CustomGraphsNamespace $customGraphs;

    /** `$client->dashboards` */
    public readonly DashboardsNamespace $dashboards;

    /** `$client->dependencyGraph` */
    public readonly DependencyGraphNamespace $dependencyGraph;

    /** `$client->deployments` */
    public readonly DeploymentsNamespace $deployments;

    /** `$client->digest` */
    public readonly DigestNamespace $digest;

    /** `$client->dns` */
    public readonly DnsNamespace $dns;

    /** `$client->docker` */
    public readonly DockerNamespace $docker;

    /** `$client->environmentDiff` */
    public readonly EnvironmentDiffNamespace $environmentDiff;

    /** `$client->expiring` */
    public readonly ExpiringNamespace $expiring;

    /** `$client->invitations` */
    public readonly InvitationsNamespace $invitations;

    /** `$client->kv` */
    public readonly KvNamespace $kv;

    /** `$client->leases` */
    public readonly LeasesNamespace $leases;

    /** `$client->logWorkspaces` */
    public readonly LogWorkspacesNamespace $logWorkspaces;

    /** `$client->metricAlerts` */
    public readonly MetricAlertsNamespace $metricAlerts;

    /** `$client->moment` */
    public readonly MomentNamespace $moment;

    /** `$client->msteams` */
    public readonly MsteamsNamespace $msteams;

    /** `$client->orgs` */
    public readonly OrgsNamespace $orgs;

    /** `$client->orphans` */
    public readonly OrphansNamespace $orphans;

    /** `$client->ownership` */
    public readonly OwnershipNamespace $ownership;

    /** `$client->pages` */
    public readonly PagesNamespace $pages;

    /** `$client->posture` */
    public readonly PostureNamespace $posture;

    /** `$client->probes` */
    public readonly ProbesNamespace $probes;

    /** `$client->profile` */
    public readonly ProfileNamespace $profile;

    /** `$client->resources` */
    public readonly ResourcesNamespace $resources;

    /** `$client->rightsizing` */
    public readonly RightsizingNamespace $rightsizing;

    /** `$client->schedules` */
    public readonly SchedulesNamespace $schedules;

    /** `$client->search` */
    public readonly SearchNamespace $search;

    /** `$client->sessionRecordings` */
    public readonly SessionRecordingsNamespace $sessionRecordings;

    /** `$client->sftp` */
    public readonly SftpNamespace $sftp;

    /** `$client->slack` */
    public readonly SlackNamespace $slack;

    /** `$client->sql` */
    public readonly SqlNamespace $sql;

    /** `$client->sshFanout` */
    public readonly SshFanoutNamespace $sshFanout;

    /** `$client->sshKeys` */
    public readonly SshKeysNamespace $sshKeys;

    /** `$client->sshTunnels` */
    public readonly SshTunnelsNamespace $sshTunnels;

    /** `$client->status` */
    public readonly StatusNamespace $status;

    /** `$client->statusIncidents` */
    public readonly StatusIncidentsNamespace $statusIncidents;

    /** `$client->statusPages` */
    public readonly StatusPagesNamespace $statusPages;

    /** `$client->storage` */
    public readonly StorageNamespace $storage;

    /** `$client->tagPolicy` */
    public readonly TagPolicyNamespace $tagPolicy;

    /** `$client->team` */
    public readonly TeamNamespace $team;

    /** `$client->workflowApprovals` */
    public readonly WorkflowApprovalsNamespace $workflowApprovals;

    /** `$client->workflows` */
    public readonly WorkflowsNamespace $workflows;

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
        $this->accessRequests = new AccessRequestsNamespace($this->transport);
        $this->accounts = new AccountsNamespace($this->transport);
        $this->agents = new AgentsNamespace($this->transport);
        $this->alertRules = new AlertRulesNamespace($this->transport);
        $this->apiKeys = new ApiKeysNamespace($this->transport);
        $this->artifacts = new ArtifactsNamespace($this->transport);
        $this->associations = new AssociationsNamespace($this->transport);
        $this->auditLogs = new AuditLogsNamespace($this->transport);
        $this->auth = new AuthNamespace($this->transport);
        $this->bastions = new BastionsNamespace($this->transport);
        $this->billing = new BillingNamespace($this->transport);
        $this->budgets = new BudgetsNamespace($this->transport);
        $this->changeFreezes = new ChangeFreezesNamespace($this->transport);
        $this->changes = new ChangesNamespace($this->transport);
        $this->config = new ConfigNamespace($this->transport);
        $this->connect = new ConnectNamespace($this->transport);
        $this->costCentres = new CostCentresNamespace($this->transport);
        $this->costs = new CostsNamespace($this->transport);
        $this->credentialHygiene = new CredentialHygieneNamespace($this->transport);
        $this->credits = new CreditsNamespace($this->transport);
        $this->customGraphs = new CustomGraphsNamespace($this->transport);
        $this->dashboards = new DashboardsNamespace($this->transport);
        $this->dependencyGraph = new DependencyGraphNamespace($this->transport);
        $this->deployments = new DeploymentsNamespace($this->transport);
        $this->digest = new DigestNamespace($this->transport);
        $this->dns = new DnsNamespace($this->transport);
        $this->docker = new DockerNamespace($this->transport);
        $this->environmentDiff = new EnvironmentDiffNamespace($this->transport);
        $this->expiring = new ExpiringNamespace($this->transport);
        $this->invitations = new InvitationsNamespace($this->transport);
        $this->kv = new KvNamespace($this->transport);
        $this->leases = new LeasesNamespace($this->transport);
        $this->logWorkspaces = new LogWorkspacesNamespace($this->transport);
        $this->metricAlerts = new MetricAlertsNamespace($this->transport);
        $this->moment = new MomentNamespace($this->transport);
        $this->msteams = new MsteamsNamespace($this->transport);
        $this->orgs = new OrgsNamespace($this->transport);
        $this->orphans = new OrphansNamespace($this->transport);
        $this->ownership = new OwnershipNamespace($this->transport);
        $this->pages = new PagesNamespace($this->transport);
        $this->posture = new PostureNamespace($this->transport);
        $this->probes = new ProbesNamespace($this->transport);
        $this->profile = new ProfileNamespace($this->transport);
        $this->resources = new ResourcesNamespace($this->transport);
        $this->rightsizing = new RightsizingNamespace($this->transport);
        $this->schedules = new SchedulesNamespace($this->transport);
        $this->search = new SearchNamespace($this->transport);
        $this->sessionRecordings = new SessionRecordingsNamespace($this->transport);
        $this->sftp = new SftpNamespace($this->transport);
        $this->slack = new SlackNamespace($this->transport);
        $this->sql = new SqlNamespace($this->transport);
        $this->sshFanout = new SshFanoutNamespace($this->transport);
        $this->sshKeys = new SshKeysNamespace($this->transport);
        $this->sshTunnels = new SshTunnelsNamespace($this->transport);
        $this->status = new StatusNamespace($this->transport);
        $this->statusIncidents = new StatusIncidentsNamespace($this->transport);
        $this->statusPages = new StatusPagesNamespace($this->transport);
        $this->storage = new StorageNamespace($this->transport);
        $this->tagPolicy = new TagPolicyNamespace($this->transport);
        $this->team = new TeamNamespace($this->transport);
        $this->workflowApprovals = new WorkflowApprovalsNamespace($this->transport);
        $this->workflows = new WorkflowsNamespace($this->transport);
    }
}
