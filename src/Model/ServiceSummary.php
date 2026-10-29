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

final class ServiceSummary implements \JsonSerializable
{
    /**
     * @param array{windowDays: int, available: bool, totals: list<array{currency: string, amount: float}>, byProvider: list<array{pluginId: string, currency: string, amount: float}>, costedMembers: int} $cost Trailing member spend, per currency. Respects the caller's cost visibility scope.
     * @param list<array{id: string, name: string, status: 'exhausted'|'fast_burn'|'slow_burn'|'ok'|'unknown', targetPercent: float, budgetRemaining: float|null}> $slos
     * @param list<array{id: string, name: string, enabled: bool}> $runbooks
     * @param array<string, mixed>|null $onCall
     * @param array<string, mixed> $findings
     * @param list<array{id: string, resourceId: string, resourceName: string, pluginId: string, changeKind: 'created'|'updated'|'deleted', fields: list<string>, at: string}> $recentChanges
     * @param list<ScorecardResult> $scorecards
     */
    public function __construct(
        public readonly Service $service,
        public readonly int $memberCount,
        public readonly array $cost,
        public readonly array $slos,
        public readonly array $runbooks,
        public readonly ?array $onCall,
        public readonly array $findings,
        public readonly array $recentChanges,
        public readonly array $scorecards,
        public readonly string $generatedAt,
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
            service: Service::fromArray(Coerce::toArray($data['service'] ?? null)),
            memberCount: Coerce::toInt($data['memberCount'] ?? null),
            cost: Coerce::toArray($data['cost'] ?? null),
            slos: Coerce::mapList($data['slos'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            runbooks: Coerce::mapList($data['runbooks'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            onCall: Coerce::toArrayOrNull($data['onCall'] ?? null),
            findings: Coerce::toArray($data['findings'] ?? null),
            recentChanges: Coerce::mapList($data['recentChanges'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            scorecards: Coerce::mapList($data['scorecards'] ?? null, static fn (mixed $item): ScorecardResult => ScorecardResult::fromArray(Coerce::toArray($item))),
            generatedAt: Coerce::toString($data['generatedAt'] ?? null),
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
            'service' => $this->service->toArray(),
            'memberCount' => $this->memberCount,
            'cost' => $this->cost,
            'slos' => $this->slos,
            'runbooks' => $this->runbooks,
            'onCall' => $this->onCall,
            'findings' => $this->findings,
            'recentChanges' => $this->recentChanges,
            'scorecards' => array_map(static fn (ScorecardResult $item): array => $item->toArray(), $this->scorecards),
            'generatedAt' => $this->generatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
