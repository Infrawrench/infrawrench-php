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

final class ManagedAccountAssignmentPreview implements \JsonSerializable
{
    /**
     * @param array{id: string, name: string}|null $target
     * @param list<array{kind: 'cost_centre'|'account', id: string, name: string, fromManagedAccountId: string|null, fromManagedAccountName: string|null, amounts: array<string, float>, unchanged: bool}> $items
     * @param list<array{fromManagedAccountId: string|null, fromManagedAccountName: string|null, amounts: array<string, float>}> $moves
     * @param array<string, float> $total Currency code → amount in the currency's major unit.
     * @param list<string> $warnings
     */
    public function __construct(
        public readonly string $periodFrom,
        public readonly string $periodTo,
        public readonly ?array $target,
        public readonly array $items,
        public readonly array $moves,
        public readonly array $total,
        public readonly int $affectedDrafts,
        public readonly array $warnings,
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
            periodFrom: Coerce::toString($data['periodFrom'] ?? null),
            periodTo: Coerce::toString($data['periodTo'] ?? null),
            target: Coerce::toArrayOrNull($data['target'] ?? null),
            items: Coerce::mapList($data['items'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            moves: Coerce::mapList($data['moves'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            total: Coerce::mapValues($data['total'] ?? null, static fn (mixed $item): float => Coerce::toFloat($item)),
            affectedDrafts: Coerce::toInt($data['affectedDrafts'] ?? null),
            warnings: Coerce::mapList($data['warnings'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'periodFrom' => $this->periodFrom,
            'periodTo' => $this->periodTo,
            'target' => $this->target,
            'items' => $this->items,
            'moves' => $this->moves,
            'total' => $this->total,
            'affectedDrafts' => $this->affectedDrafts,
            'warnings' => $this->warnings,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
