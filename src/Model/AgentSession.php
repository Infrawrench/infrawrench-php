<?php

/*
 * infrawrench/sdk v1.71.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.71.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk\Model;

use Infrawrench\Sdk\Internal\Coerce;

final class AgentSession implements \JsonSerializable
{
    /**
     * @param 'codex'|'claude-code' $tool
     * @param 'pending'|'provisioning'|'setting-up'|'up'|'failed'|'stopped' $status
     * @param list<string> $logs
     * @param 'terminal'|'t3-code'|null $surface
     * @param list<string>|null $serviceAccountIds Accounts whose plugin installs a service on the VM over SSH after setup (e.g. Tailscale). See GET /resources/ssh-install/accounts.
     * @param 't3-connect'|'tailscale'|null $t3Access
     * @param list<AgentServiceInstall>|null $serviceInstalls
     */
    public function __construct(
        public readonly string $id,
        public readonly string $repo,
        public readonly string $projectName,
        public readonly string $workspaceName,
        public readonly string $accountId,
        public readonly string $pluginId,
        public readonly string $resourceTypeId,
        public readonly string $tool,
        public readonly string $branchName,
        public readonly string $status,
        public readonly ?string $vmResourceId,
        public readonly array $logs,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly ?string $surface = null,
        public readonly ?array $serviceAccountIds = null,
        public readonly ?string $t3Access = null,
        public readonly ?array $serviceInstalls = null,
    ) {
    }

    /**
     * Build one from a decoded JSON object.
     *
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: Coerce::toString($data['id'] ?? null),
            repo: Coerce::toString($data['repo'] ?? null),
            projectName: Coerce::toString($data['projectName'] ?? null),
            workspaceName: Coerce::toString($data['workspaceName'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            tool: Coerce::toString($data['tool'] ?? null),
            branchName: Coerce::toString($data['branchName'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            vmResourceId: Coerce::toStringOrNull($data['vmResourceId'] ?? null),
            logs: Coerce::mapList($data['logs'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
            surface: Coerce::toStringOrNull($data['surface'] ?? null),
            serviceAccountIds: Coerce::nullable($data['serviceAccountIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            t3Access: Coerce::toStringOrNull($data['t3Access'] ?? null),
            serviceInstalls: Coerce::nullable($data['serviceInstalls'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): AgentServiceInstall => AgentServiceInstall::fromArray(Coerce::toArray($item)))),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
            'id' => $this->id,
            'repo' => $this->repo,
            'projectName' => $this->projectName,
            'workspaceName' => $this->workspaceName,
            'accountId' => $this->accountId,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'tool' => $this->tool,
            'branchName' => $this->branchName,
            'status' => $this->status,
            'vmResourceId' => $this->vmResourceId,
            'logs' => $this->logs,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
        if ($this->surface !== null) {
            $payload['surface'] = $this->surface;
        }
        if ($this->serviceAccountIds !== null) {
            $payload['serviceAccountIds'] = $this->serviceAccountIds;
        }
        if ($this->t3Access !== null) {
            $payload['t3Access'] = $this->t3Access;
        }
        if ($this->serviceInstalls !== null) {
            $payload['serviceInstalls'] = array_map(static fn (AgentServiceInstall $item): array => $item->toArray(), $this->serviceInstalls);
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
