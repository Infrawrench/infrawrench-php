<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class ComplianceControlSetting implements \JsonSerializable
{
    /**
     * @param string $frameworkId Framework registry id: `soc2` or `iso27001`.
     * @param string|null $justification Required when `applicable` is false.
     * @param string|null $ownerUserId A member who owns the control.
     * @param string|null $ownerLabel A team or alias, when the owner is not one member.
     */
    public function __construct(
        public readonly string $frameworkId,
        public readonly string $controlId,
        public readonly bool $applicable,
        public readonly ?string $justification,
        public readonly ?string $ownerUserId,
        public readonly ?string $ownerLabel,
        public readonly ?string $notes,
        public readonly ?string $updatedByUserId,
        public readonly string $updatedAt,
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
            frameworkId: Coerce::toString($data['frameworkId'] ?? null),
            controlId: Coerce::toString($data['controlId'] ?? null),
            applicable: Coerce::toBool($data['applicable'] ?? null),
            justification: Coerce::toStringOrNull($data['justification'] ?? null),
            ownerUserId: Coerce::toStringOrNull($data['ownerUserId'] ?? null),
            ownerLabel: Coerce::toStringOrNull($data['ownerLabel'] ?? null),
            notes: Coerce::toStringOrNull($data['notes'] ?? null),
            updatedByUserId: Coerce::toStringOrNull($data['updatedByUserId'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'frameworkId' => $this->frameworkId,
            'controlId' => $this->controlId,
            'applicable' => $this->applicable,
            'justification' => $this->justification,
            'ownerUserId' => $this->ownerUserId,
            'ownerLabel' => $this->ownerLabel,
            'notes' => $this->notes,
            'updatedByUserId' => $this->updatedByUserId,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
