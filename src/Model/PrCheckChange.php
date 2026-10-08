<?php

/*
 * infrawrench/sdk v1.79.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.79.0).
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

final class PrCheckChange implements \JsonSerializable
{
    /**
     * @param 'create'|'update'|'delete' $action
     * @param string|null $resourceId The synced resource the block manages, matched through uploaded Terraform state.
     * @param list<string> $changedAttributes
     * @param int|null $count The block's literal `count`; null for `for_each` or a computed count.
     * @param float|null $monthlyDelta Null when either side could not be priced; never zero for unknown.
     * @param array{directDependants: int, transitiveDependants: int, references: int, severity: 'none'|'low'|'medium'|'high'|'unknown', headline: string, topDependants: list<string>, unchecked: int}|null $blastRadius
     * @param list<array{kind: 'rightsizing'|'tag-policy'|'posture'|'parse', severity: 'notice'|'warning', message: string}> $warnings
     */
    public function __construct(
        public readonly string $address,
        public readonly string $terraformType,
        public readonly string $action,
        public readonly string $path,
        public readonly ?int $line,
        public readonly ?string $resourceId,
        public readonly ?string $displayName,
        public readonly ?string $pluginId,
        public readonly ?string $resourceTypeId,
        public readonly array $changedAttributes,
        public readonly ?int $count,
        public readonly ?PrCheckEstimateSide $before,
        public readonly ?PrCheckEstimateSide $after,
        public readonly ?float $monthlyDelta,
        public readonly ?string $currency,
        public readonly ?string $unpricedReason,
        public readonly ?array $blastRadius,
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
            address: Coerce::toString($data['address'] ?? null),
            terraformType: Coerce::toString($data['terraformType'] ?? null),
            action: Coerce::toString($data['action'] ?? null),
            path: Coerce::toString($data['path'] ?? null),
            line: Coerce::toIntOrNull($data['line'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            displayName: Coerce::toStringOrNull($data['displayName'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            changedAttributes: Coerce::mapList($data['changedAttributes'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            count: Coerce::toIntOrNull($data['count'] ?? null),
            before: Coerce::nullable($data['before'] ?? null, static fn (mixed $value): PrCheckEstimateSide => PrCheckEstimateSide::fromArray(Coerce::toArray($value))),
            after: Coerce::nullable($data['after'] ?? null, static fn (mixed $value): PrCheckEstimateSide => PrCheckEstimateSide::fromArray(Coerce::toArray($value))),
            monthlyDelta: Coerce::toFloatOrNull($data['monthlyDelta'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            unpricedReason: Coerce::toStringOrNull($data['unpricedReason'] ?? null),
            blastRadius: Coerce::toArrayOrNull($data['blastRadius'] ?? null),
            warnings: Coerce::mapList($data['warnings'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'address' => $this->address,
            'terraformType' => $this->terraformType,
            'action' => $this->action,
            'path' => $this->path,
            'line' => $this->line,
            'resourceId' => $this->resourceId,
            'displayName' => $this->displayName,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'changedAttributes' => $this->changedAttributes,
            'count' => $this->count,
            'before' => $this->before?->toArray(),
            'after' => $this->after?->toArray(),
            'monthlyDelta' => $this->monthlyDelta,
            'currency' => $this->currency,
            'unpricedReason' => $this->unpricedReason,
            'blastRadius' => $this->blastRadius,
            'warnings' => $this->warnings,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
