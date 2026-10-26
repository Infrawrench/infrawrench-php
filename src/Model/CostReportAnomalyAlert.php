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

final class CostReportAnomalyAlert implements \JsonSerializable
{
    /**
     * @param bool $enabled Off keeps the configuration but stops evaluation.
     * @param float $sigmas Standard deviations above the trailing 28-day mean that count as anomalous, 1 to 10. The org-wide default is 3.
     * @param int $minDeltaCents Least rise over the trailing mean, in cents of the spend's own currency, before a day is reported however many standard deviations it is. 100 to 10,000,000.
     * @param list<array{kind: 'push'}|array{kind: 'slack', channelId: string}|array{kind: 'msteams', webhookId: string}|array{kind: 'on-call', scheduleId: string}|array{kind: 'github-issues'}|array{kind: 'email-member', userId: string}|array{kind: 'paging-provider', accountId: string, targetId: string}|array{kind: 'provider-on-call', accountId: string, sourceId: string}|array{kind: 'email-address', address: string}> $destinations Where findings go, in the alert routing vocabulary (`GET …/anomaly-alert/targets` lists what is available). Delivered as given: organization alert rules neither redirect, swallow nor hold them for quiet hours. At least one when `enabled`.
     * @param list<CostReportAnomaly> $recent The latest 20 findings, newest first.
     */
    public function __construct(
        public readonly bool $enabled,
        public readonly float $sigmas,
        public readonly int $minDeltaCents,
        public readonly array $destinations,
        public readonly string $id,
        public readonly string $reportId,
        public readonly string $reportName,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly ?string $lastEvaluatedAt,
        public readonly ?string $lastError,
        public readonly array $recent,
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
            enabled: Coerce::toBool($data['enabled'] ?? null),
            sigmas: Coerce::toFloat($data['sigmas'] ?? null),
            minDeltaCents: Coerce::toInt($data['minDeltaCents'] ?? null),
            destinations: Coerce::toList($data['destinations'] ?? null),
            id: Coerce::toString($data['id'] ?? null),
            reportId: Coerce::toString($data['reportId'] ?? null),
            reportName: Coerce::toString($data['reportName'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
            lastEvaluatedAt: Coerce::toStringOrNull($data['lastEvaluatedAt'] ?? null),
            lastError: Coerce::toStringOrNull($data['lastError'] ?? null),
            recent: Coerce::mapList($data['recent'] ?? null, static fn (mixed $item): CostReportAnomaly => CostReportAnomaly::fromArray(Coerce::toArray($item))),
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
            'enabled' => $this->enabled,
            'sigmas' => $this->sigmas,
            'minDeltaCents' => $this->minDeltaCents,
            'destinations' => $this->destinations,
            'id' => $this->id,
            'reportId' => $this->reportId,
            'reportName' => $this->reportName,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'lastEvaluatedAt' => $this->lastEvaluatedAt,
            'lastError' => $this->lastError,
            'recent' => array_map(static fn (CostReportAnomaly $item): array => $item->toArray(), $this->recent),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
