<?php

/*
 * infrawrench/sdk v1.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.35.0).
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

final class RunbookRun implements \JsonSerializable
{
    /**
     * @param string $runbookName The runbook's name when the run started.
     * @param 'running'|'completed'|'abandoned' $status
     * @param string|null $incidentId The incident this was performed under. Not a cascading reference: deleting the incident must not delete the record that somebody followed the failover procedure at 03:14.
     * @param list<RunbookRunStep> $steps
     */
    public function __construct(
        public readonly string $id,
        public readonly string $runbookId,
        public readonly string $runbookName,
        public readonly string $status,
        public readonly ?string $incidentId,
        public readonly ?string $startedByUserId,
        public readonly ?string $startedByName,
        public readonly string $startedAt,
        public readonly ?string $completedAt,
        public readonly ?string $summary,
        public readonly array $steps,
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
            runbookId: Coerce::toString($data['runbookId'] ?? null),
            runbookName: Coerce::toString($data['runbookName'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            incidentId: Coerce::toStringOrNull($data['incidentId'] ?? null),
            startedByUserId: Coerce::toStringOrNull($data['startedByUserId'] ?? null),
            startedByName: Coerce::toStringOrNull($data['startedByName'] ?? null),
            startedAt: Coerce::toString($data['startedAt'] ?? null),
            completedAt: Coerce::toStringOrNull($data['completedAt'] ?? null),
            summary: Coerce::toStringOrNull($data['summary'] ?? null),
            steps: Coerce::mapList($data['steps'] ?? null, static fn (mixed $item): RunbookRunStep => RunbookRunStep::fromArray(Coerce::toArray($item))),
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
            'runbookId' => $this->runbookId,
            'runbookName' => $this->runbookName,
            'status' => $this->status,
            'incidentId' => $this->incidentId,
            'startedByUserId' => $this->startedByUserId,
            'startedByName' => $this->startedByName,
            'startedAt' => $this->startedAt,
            'completedAt' => $this->completedAt,
            'summary' => $this->summary,
            'steps' => array_map(static fn (RunbookRunStep $item): array => $item->toArray(), $this->steps),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
