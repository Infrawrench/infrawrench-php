<?php

/*
 * infrawrench/sdk v1.132.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.132.0).
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

final class MigrationTotals implements \JsonSerializable
{
    /**
     * @param list<MigrationMoney> $current
     * @param list<MigrationMoney> $target
     * @param list<MigrationMoney> $unmatchedCurrent
     * @param array{currency: string, current: float, target: float, pairedDelta: float, pairedRows: int}|null $comparable Every figure in one currency (the org's display currency, or the one currency all figures are in); null when they cannot be converted.
     */
    public function __construct(
        public readonly array $current,
        public readonly array $target,
        public readonly int $currentUnknown,
        public readonly int $targetUnknown,
        public readonly array $unmatchedCurrent,
        public readonly ?array $comparable,
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
            current: Coerce::mapList($data['current'] ?? null, static fn (mixed $item): MigrationMoney => MigrationMoney::fromArray(Coerce::toArray($item))),
            target: Coerce::mapList($data['target'] ?? null, static fn (mixed $item): MigrationMoney => MigrationMoney::fromArray(Coerce::toArray($item))),
            currentUnknown: Coerce::toInt($data['currentUnknown'] ?? null),
            targetUnknown: Coerce::toInt($data['targetUnknown'] ?? null),
            unmatchedCurrent: Coerce::mapList($data['unmatchedCurrent'] ?? null, static fn (mixed $item): MigrationMoney => MigrationMoney::fromArray(Coerce::toArray($item))),
            comparable: Coerce::toArrayOrNull($data['comparable'] ?? null),
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
            'current' => array_map(static fn (MigrationMoney $item): array => $item->toArray(), $this->current),
            'target' => array_map(static fn (MigrationMoney $item): array => $item->toArray(), $this->target),
            'currentUnknown' => $this->currentUnknown,
            'targetUnknown' => $this->targetUnknown,
            'unmatchedCurrent' => array_map(static fn (MigrationMoney $item): array => $item->toArray(), $this->unmatchedCurrent),
            'comparable' => $this->comparable,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
