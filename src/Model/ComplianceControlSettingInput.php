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

final class ComplianceControlSettingInput implements \JsonSerializable
{
    public function __construct(
        public readonly bool $applicable,
        public readonly ?string $justification = null,
        public readonly ?string $ownerUserId = null,
        public readonly ?string $ownerLabel = null,
        public readonly ?string $notes = null,
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
            applicable: Coerce::toBool($data['applicable'] ?? null),
            justification: Coerce::toStringOrNull($data['justification'] ?? null),
            ownerUserId: Coerce::toStringOrNull($data['ownerUserId'] ?? null),
            ownerLabel: Coerce::toStringOrNull($data['ownerLabel'] ?? null),
            notes: Coerce::toStringOrNull($data['notes'] ?? null),
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
            'applicable' => $this->applicable,
        ];
        if ($this->justification !== null) {
            $payload['justification'] = $this->justification;
        }
        if ($this->ownerUserId !== null) {
            $payload['ownerUserId'] = $this->ownerUserId;
        }
        if ($this->ownerLabel !== null) {
            $payload['ownerLabel'] = $this->ownerLabel;
        }
        if ($this->notes !== null) {
            $payload['notes'] = $this->notes;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
