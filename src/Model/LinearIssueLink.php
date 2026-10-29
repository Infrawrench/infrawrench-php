<?php

/*
 * infrawrench/sdk v1.85.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.85.0).
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

final class LinearIssueLink implements \JsonSerializable
{
    /**
     * @param LinearSourceKind::* $sourceKind
     * @param string|null $status The tracker's own status name, e.g. `In Progress`, `Backlog`, `Closed`.
     * @param IssueStatusCategory::* $statusCategory
     * @param string|null $assignee Assignee display name (Jira, Linear) or login (GitHub).
     * @param string|null $issueUpdatedAt When the issue last changed, as the tracker reports it.
     * @param string|null $statusSyncedAt When Infrawrench last learned the status, by webhook or poll.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $sourceKind,
        public readonly string $sourceId,
        public readonly string $issueIdentifier,
        public readonly string $issueUrl,
        public readonly ?string $status,
        public readonly string $statusCategory,
        public readonly ?string $assignee,
        public readonly ?string $issueUpdatedAt,
        public readonly ?string $statusSyncedAt,
        public readonly ?string $createdByUserId,
        public readonly string $createdAt,
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
            sourceKind: Coerce::toString($data['sourceKind'] ?? null),
            sourceId: Coerce::toString($data['sourceId'] ?? null),
            issueIdentifier: Coerce::toString($data['issueIdentifier'] ?? null),
            issueUrl: Coerce::toString($data['issueUrl'] ?? null),
            status: Coerce::toStringOrNull($data['status'] ?? null),
            statusCategory: Coerce::toString($data['statusCategory'] ?? null),
            assignee: Coerce::toStringOrNull($data['assignee'] ?? null),
            issueUpdatedAt: Coerce::toStringOrNull($data['issueUpdatedAt'] ?? null),
            statusSyncedAt: Coerce::toStringOrNull($data['statusSyncedAt'] ?? null),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
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
            'sourceKind' => $this->sourceKind,
            'sourceId' => $this->sourceId,
            'issueIdentifier' => $this->issueIdentifier,
            'issueUrl' => $this->issueUrl,
            'status' => $this->status,
            'statusCategory' => $this->statusCategory,
            'assignee' => $this->assignee,
            'issueUpdatedAt' => $this->issueUpdatedAt,
            'statusSyncedAt' => $this->statusSyncedAt,
            'createdByUserId' => $this->createdByUserId,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
