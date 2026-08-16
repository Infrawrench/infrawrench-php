<?php

/*
 * infrawrench/sdk v1.27.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.27.0).
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

final class EnvironmentDiffTotals implements \JsonSerializable
{
    /**
     * @param int $suppressedFieldChanges Field divergences the identity filter hid across every pair.
     */
    public function __construct(
        public readonly int $onlyInA,
        public readonly int $onlyInB,
        public readonly int $changed,
        public readonly int $identical,
        public readonly int $typesOnlyInA,
        public readonly int $typesOnlyInB,
        public readonly int $suppressedFieldChanges,
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
            onlyInA: Coerce::toInt($data['onlyInA'] ?? null),
            onlyInB: Coerce::toInt($data['onlyInB'] ?? null),
            changed: Coerce::toInt($data['changed'] ?? null),
            identical: Coerce::toInt($data['identical'] ?? null),
            typesOnlyInA: Coerce::toInt($data['typesOnlyInA'] ?? null),
            typesOnlyInB: Coerce::toInt($data['typesOnlyInB'] ?? null),
            suppressedFieldChanges: Coerce::toInt($data['suppressedFieldChanges'] ?? null),
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
            'onlyInA' => $this->onlyInA,
            'onlyInB' => $this->onlyInB,
            'changed' => $this->changed,
            'identical' => $this->identical,
            'typesOnlyInA' => $this->typesOnlyInA,
            'typesOnlyInB' => $this->typesOnlyInB,
            'suppressedFieldChanges' => $this->suppressedFieldChanges,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
