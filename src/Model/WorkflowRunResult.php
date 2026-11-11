<?php

/*
 * infrawrench/sdk v1.102.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.102.0).
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

final class WorkflowRunResult implements \JsonSerializable
{
    /**
     * @param 'pending'|'running'|'success'|'failure'|'canceled' $status
     * @param list<WorkflowRunLog> $logs
     */
    public function __construct(
        public readonly string $status,
        public readonly array $logs,
        public readonly float $startedAt,
        public readonly float $finishedAt,
        public readonly float $durationMs,
        public readonly mixed $output = null,
        public readonly ?WorkflowRunError $error = null,
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
            status: Coerce::toString($data['status'] ?? null),
            logs: Coerce::mapList($data['logs'] ?? null, static fn (mixed $item): WorkflowRunLog => WorkflowRunLog::fromArray(Coerce::toArray($item))),
            startedAt: Coerce::toFloat($data['startedAt'] ?? null),
            finishedAt: Coerce::toFloat($data['finishedAt'] ?? null),
            durationMs: Coerce::toFloat($data['durationMs'] ?? null),
            output: $data['output'] ?? null,
            error: Coerce::nullable($data['error'] ?? null, static fn (mixed $value): WorkflowRunError => WorkflowRunError::fromArray(Coerce::toArray($value))),
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
            'status' => $this->status,
            'logs' => array_map(static fn (WorkflowRunLog $item): array => $item->toArray(), $this->logs),
            'startedAt' => $this->startedAt,
            'finishedAt' => $this->finishedAt,
            'durationMs' => $this->durationMs,
        ];
        if ($this->output !== null) {
            $payload['output'] = $this->output;
        }
        if ($this->error !== null) {
            $payload['error'] = $this->error->toArray();
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
