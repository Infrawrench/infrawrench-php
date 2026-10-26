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

final class KubernetesEfficiencyRow implements \JsonSerializable
{
    /**
     * @param 'group'|'idle'|'overhead'|'unattributed' $kind
     * @param list<array{category: KubernetesCostCategory::*, figures: array<string, mixed>}> $categories
     * @param list<array{bucket: string, total: float, used: float, unused: float, unmeasured: float, idle: float, overhead: float, allocated: float, efficiency: float|null, measuredShare: float|null}> $points
     */
    public function __construct(
        public readonly string $key,
        public readonly string $kind,
        public readonly string $label,
        public readonly KubernetesEfficiencyFigures $figures,
        public readonly array $categories,
        public readonly array $points,
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
            key: Coerce::toString($data['key'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            label: Coerce::toString($data['label'] ?? null),
            figures: KubernetesEfficiencyFigures::fromArray(Coerce::toArray($data['figures'] ?? null)),
            categories: Coerce::mapList($data['categories'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            points: Coerce::mapList($data['points'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'key' => $this->key,
            'kind' => $this->kind,
            'label' => $this->label,
            'figures' => $this->figures->toArray(),
            'categories' => $this->categories,
            'points' => $this->points,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
