<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

/**
 * Present when a metric-based idle rule flagged the row rather than the type's orphan rule: the
 * rule, the metric evidence and the lookback window.
 */
final class OrphanIdleDetail implements \JsonSerializable
{
    /**
     * @param string $ruleKey `pluginId:ruleId`, the key the settings use.
     * @param 'remove'|'reconfigure'|'stop' $action What acting on it means. Only `remove` findings are offered as a removal pull request.
     * @param list<IdleMetricEvidence> $evidence
     * @param string $detectedAt First collection that flagged it.
     * @param string $evaluatedAt Latest collection that confirmed it.
     * @param bool $hasResource False when the subject is not a synced resource (a custom metric): `id` is then a finding id, not a resource id.
     */
    public function __construct(
        public readonly string $ruleId,
        public readonly string $ruleKey,
        public readonly string $ruleLabel,
        public readonly string $action,
        public readonly int $lookbackDays,
        public readonly array $evidence,
        public readonly string $detectedAt,
        public readonly string $evaluatedAt,
        public readonly bool $hasResource,
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
            ruleId: Coerce::toString($data['ruleId'] ?? null),
            ruleKey: Coerce::toString($data['ruleKey'] ?? null),
            ruleLabel: Coerce::toString($data['ruleLabel'] ?? null),
            action: Coerce::toString($data['action'] ?? null),
            lookbackDays: Coerce::toInt($data['lookbackDays'] ?? null),
            evidence: Coerce::mapList($data['evidence'] ?? null, static fn (mixed $item): IdleMetricEvidence => IdleMetricEvidence::fromArray(Coerce::toArray($item))),
            detectedAt: Coerce::toString($data['detectedAt'] ?? null),
            evaluatedAt: Coerce::toString($data['evaluatedAt'] ?? null),
            hasResource: Coerce::toBool($data['hasResource'] ?? null),
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
            'ruleId' => $this->ruleId,
            'ruleKey' => $this->ruleKey,
            'ruleLabel' => $this->ruleLabel,
            'action' => $this->action,
            'lookbackDays' => $this->lookbackDays,
            'evidence' => array_map(static fn (IdleMetricEvidence $item): array => $item->toArray(), $this->evidence),
            'detectedAt' => $this->detectedAt,
            'evaluatedAt' => $this->evaluatedAt,
            'hasResource' => $this->hasResource,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
