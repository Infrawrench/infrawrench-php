<?php

/*
 * infrawrench/sdk v1.18.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.18.0).
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

final class RevertFieldPlan implements \JsonSerializable
{
    /**
     * @param RevertFieldStatus::* $status
     * @param string $reason One sentence explaining the status.
     * @param mixed $revertTo The value a revert would write.
     * @param mixed $changedTo The value the recorded change set.
     * @param mixed $current The value the resource holds right now, read live.
     */
    public function __construct(
        public readonly string $field,
        public readonly string $status,
        public readonly string $reason,
        public readonly mixed $revertTo = null,
        public readonly mixed $changedTo = null,
        public readonly mixed $current = null,
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
            field: Coerce::toString($data['field'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            reason: Coerce::toString($data['reason'] ?? null),
            revertTo: $data['revertTo'] ?? null,
            changedTo: $data['changedTo'] ?? null,
            current: $data['current'] ?? null,
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
            'field' => $this->field,
            'status' => $this->status,
            'reason' => $this->reason,
        ];
        if ($this->revertTo !== null) {
            $payload['revertTo'] = $this->revertTo;
        }
        if ($this->changedTo !== null) {
            $payload['changedTo'] = $this->changedTo;
        }
        if ($this->current !== null) {
            $payload['current'] = $this->current;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
