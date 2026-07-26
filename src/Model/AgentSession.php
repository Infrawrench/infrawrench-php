<?php

/*
 * infrawrench/sdk v0.3.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.3.0).
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
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
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
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
