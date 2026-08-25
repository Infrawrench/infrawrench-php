<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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

final class RunbookStepUpdate implements \JsonSerializable
{
    /**
     * @param 'pending'|'done'|'skipped'|'failed' $status
     * @param string|null $note Omitted leaves the note alone; `null` clears it.
     */
    public function __construct(
        public readonly string $status,
        public readonly ?string $note = null,
        public readonly ?string $workflowRunId = null,
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
            note: Coerce::toStringOrNull($data['note'] ?? null),
            workflowRunId: Coerce::toStringOrNull($data['workflowRunId'] ?? null),
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
        ];
        if ($this->note !== null) {
            $payload['note'] = $this->note;
        }
        if ($this->workflowRunId !== null) {
            $payload['workflowRunId'] = $this->workflowRunId;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
