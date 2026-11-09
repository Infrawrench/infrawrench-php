<?php

/*
 * infrawrench/sdk v1.100.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.100.0).
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

final class WorkflowRun implements \JsonSerializable
{
    /**
     * @param string $organizationId Organization id
     * @param 'pending'|'running'|'success'|'failure'|'canceled' $status
     * @param string $triggerSource `manual`, `cron`, `git`, `api` or `budget`.
     * @param list<WorkflowRunLog> $logs
     */
    public function __construct(
        public readonly string $id,
        public readonly string $organizationId,
        public readonly string $workflowId,
        public readonly string $status,
        public readonly string $triggerSource,
        public readonly array $logs,
        public readonly mixed $output,
        public readonly ?WorkflowRunError $error,
        public readonly ?string $startedAt,
        public readonly ?string $finishedAt,
        public readonly ?int $durationMs,
        public readonly int $syncVersion,
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
            organizationId: Coerce::toString($data['organizationId'] ?? null),
            workflowId: Coerce::toString($data['workflowId'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            triggerSource: Coerce::toString($data['triggerSource'] ?? null),
            logs: Coerce::mapList($data['logs'] ?? null, static fn (mixed $item): WorkflowRunLog => WorkflowRunLog::fromArray(Coerce::toArray($item))),
            output: $data['output'] ?? null,
            error: Coerce::nullable($data['error'] ?? null, static fn (mixed $value): WorkflowRunError => WorkflowRunError::fromArray(Coerce::toArray($value))),
            startedAt: Coerce::toStringOrNull($data['startedAt'] ?? null),
            finishedAt: Coerce::toStringOrNull($data['finishedAt'] ?? null),
            durationMs: Coerce::toIntOrNull($data['durationMs'] ?? null),
            syncVersion: Coerce::toInt($data['syncVersion'] ?? null),
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
            'organizationId' => $this->organizationId,
            'workflowId' => $this->workflowId,
            'status' => $this->status,
            'triggerSource' => $this->triggerSource,
            'logs' => array_map(static fn (WorkflowRunLog $item): array => $item->toArray(), $this->logs),
            'output' => $this->output,
            'error' => $this->error?->toArray(),
            'startedAt' => $this->startedAt,
            'finishedAt' => $this->finishedAt,
            'durationMs' => $this->durationMs,
            'syncVersion' => $this->syncVersion,
            'createdAt' => $this->createdAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
