<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

/**
 * `data` of a `issue.status_changed` event, version 1. An issue filed from a finding moved to a
 * different status in Jira, Linear or GitHub. The first status Infrawrench learns for an issue is
 * a baseline and raises nothing.
 *
 * Spec schema: `EventData_issue_status_changed_v1`.
 */
final class EventDataIssueStatusChangedV1 implements \JsonSerializable
{
    /**
     * @param 'jira'|'linear'|'github' $tracker Where the issue lives.
     * @param string $issue The issue's handle: a Jira key, a Linear identifier, or owner/repo#number.
     * @param string $issueUrl The issue in the tracker.
     * @param string $sourceKind The kind of finding the issue was filed from, e.g. cost_anomaly.
     * @param string $sourceId The finding's own id.
     * @param string|null $status The tracker's status name now.
     * @param 'todo'|'in_progress'|'done'|'canceled'|null $statusCategory Tracker-neutral progress now.
     * @param string|null $previousStatus The status name before.
     * @param 'todo'|'in_progress'|'done'|'canceled'|null $previousStatusCategory Tracker-neutral progress before.
     * @param string|null $assignee Who the issue is assigned to now.
     */
    public function __construct(
        public readonly string $tracker,
        public readonly string $issue,
        public readonly string $issueUrl,
        public readonly string $sourceKind,
        public readonly string $sourceId,
        public readonly ?string $status,
        public readonly ?string $statusCategory,
        public readonly ?string $previousStatus,
        public readonly ?string $previousStatusCategory,
        public readonly ?string $assignee,
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
            tracker: Coerce::toString($data['tracker'] ?? null),
            issue: Coerce::toString($data['issue'] ?? null),
            issueUrl: Coerce::toString($data['issueUrl'] ?? null),
            sourceKind: Coerce::toString($data['sourceKind'] ?? null),
            sourceId: Coerce::toString($data['sourceId'] ?? null),
            status: Coerce::toStringOrNull($data['status'] ?? null),
            statusCategory: Coerce::toStringOrNull($data['statusCategory'] ?? null),
            previousStatus: Coerce::toStringOrNull($data['previousStatus'] ?? null),
            previousStatusCategory: Coerce::toStringOrNull($data['previousStatusCategory'] ?? null),
            assignee: Coerce::toStringOrNull($data['assignee'] ?? null),
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
            'tracker' => $this->tracker,
            'issue' => $this->issue,
            'issueUrl' => $this->issueUrl,
            'sourceKind' => $this->sourceKind,
            'sourceId' => $this->sourceId,
            'status' => $this->status,
            'statusCategory' => $this->statusCategory,
            'previousStatus' => $this->previousStatus,
            'previousStatusCategory' => $this->previousStatusCategory,
            'assignee' => $this->assignee,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
