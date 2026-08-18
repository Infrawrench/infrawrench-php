<?php

/*
 * infrawrench/sdk v1.29.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.0).
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

final class StatusPageComponentInput implements \JsonSerializable
{
    public function __construct(
        public readonly string $probeId,
        public readonly ?string $label = null,
        public readonly ?string $groupName = null,
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
            probeId: Coerce::toString($data['probeId'] ?? null),
            label: Coerce::toStringOrNull($data['label'] ?? null),
            groupName: Coerce::toStringOrNull($data['groupName'] ?? null),
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
            'probeId' => $this->probeId,
        ];
        if ($this->label !== null) {
            $payload['label'] = $this->label;
        }
        if ($this->groupName !== null) {
            $payload['groupName'] = $this->groupName;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
