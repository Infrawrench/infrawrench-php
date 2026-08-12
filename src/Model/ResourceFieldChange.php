<?php

/*
 * infrawrench/sdk v1.14.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.14.0).
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

final class ResourceFieldChange implements \JsonSerializable
{
    /**
     * @param string $field Top-level field key that changed. Resolved-output keys are prefixed `outputs.`.
     * @param mixed $from Previous value (null when the field was absent).
     * @param mixed $to New value.
     */
    public function __construct(
        public readonly string $field,
        public readonly mixed $from = null,
        public readonly mixed $to = null,
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
            from: $data['from'] ?? null,
            to: $data['to'] ?? null,
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
        ];
        if ($this->from !== null) {
            $payload['from'] = $this->from;
        }
        if ($this->to !== null) {
            $payload['to'] = $this->to;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
