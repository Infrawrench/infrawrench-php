<?php

/*
 * infrawrench/sdk v1.29.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.29.1).
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

final class EnvironmentDiffTypeSummary implements \JsonSerializable
{
    /**
     * @param int $delta `countB - countA`.
     * @param int $changed Matched pairs that disagree on at least one field.
     * @param int $identical Matched pairs with no visible divergence.
     * @param 'a'|'b'|null $missingFrom Set when the resource type is absent from that side entirely.
     */
    public function __construct(
        public readonly string $resourceTypeId,
        public readonly string $resourceTypeName,
        public readonly int $countA,
        public readonly int $countB,
        public readonly int $delta,
        public readonly int $onlyInA,
        public readonly int $onlyInB,
        public readonly int $changed,
        public readonly int $identical,
        public readonly ?string $missingFrom,
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
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceTypeName: Coerce::toString($data['resourceTypeName'] ?? null),
            countA: Coerce::toInt($data['countA'] ?? null),
            countB: Coerce::toInt($data['countB'] ?? null),
            delta: Coerce::toInt($data['delta'] ?? null),
            onlyInA: Coerce::toInt($data['onlyInA'] ?? null),
            onlyInB: Coerce::toInt($data['onlyInB'] ?? null),
            changed: Coerce::toInt($data['changed'] ?? null),
            identical: Coerce::toInt($data['identical'] ?? null),
            missingFrom: Coerce::toStringOrNull($data['missingFrom'] ?? null),
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
            'resourceTypeId' => $this->resourceTypeId,
            'resourceTypeName' => $this->resourceTypeName,
            'countA' => $this->countA,
            'countB' => $this->countB,
            'delta' => $this->delta,
            'onlyInA' => $this->onlyInA,
            'onlyInB' => $this->onlyInB,
            'changed' => $this->changed,
            'identical' => $this->identical,
            'missingFrom' => $this->missingFrom,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
