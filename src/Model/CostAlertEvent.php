<?php

/*
 * infrawrench/sdk v1.21.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.21.0).
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

final class CostAlertEvent implements \JsonSerializable
{
    /**
     * @param string $periodKey The cadence period the firing belongs to — a day, an ISO week (2026-W32) or a month (2026-08). One period fires at most once per group and currency.
     * @param string $groupKey The offending group; empty when the alert watches one total.
     * @param int|null $changePercent Signed percent change. Null when the prior window had no spend at all (new spend — the change is infinite); -100 when the group vanished.
     * @param 'increase'|'decrease' $direction
     */
    public function __construct(
        public readonly string $id,
        public readonly string $alertId,
        public readonly string $alertName,
        public readonly string $periodKey,
        public readonly string $windowFrom,
        public readonly string $windowTo,
        public readonly string $previousFrom,
        public readonly string $previousTo,
        public readonly string $groupKey,
        public readonly string $currency,
        public readonly int $previousAmountCents,
        public readonly int $currentAmountCents,
        public readonly ?int $changePercent,
        public readonly string $direction,
        public readonly string $firedAt,
        public readonly ?string $notifiedAt,
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
            id: Coerce::toString($data['id'] ?? null),
            alertId: Coerce::toString($data['alertId'] ?? null),
            alertName: Coerce::toString($data['alertName'] ?? null),
            periodKey: Coerce::toString($data['periodKey'] ?? null),
            windowFrom: Coerce::toString($data['windowFrom'] ?? null),
            windowTo: Coerce::toString($data['windowTo'] ?? null),
            previousFrom: Coerce::toString($data['previousFrom'] ?? null),
            previousTo: Coerce::toString($data['previousTo'] ?? null),
            groupKey: Coerce::toString($data['groupKey'] ?? null),
            currency: Coerce::toString($data['currency'] ?? null),
            previousAmountCents: Coerce::toInt($data['previousAmountCents'] ?? null),
            currentAmountCents: Coerce::toInt($data['currentAmountCents'] ?? null),
            changePercent: Coerce::toIntOrNull($data['changePercent'] ?? null),
            direction: Coerce::toString($data['direction'] ?? null),
            firedAt: Coerce::toString($data['firedAt'] ?? null),
            notifiedAt: Coerce::toStringOrNull($data['notifiedAt'] ?? null),
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
            'id' => $this->id,
            'alertId' => $this->alertId,
            'alertName' => $this->alertName,
            'periodKey' => $this->periodKey,
            'windowFrom' => $this->windowFrom,
            'windowTo' => $this->windowTo,
            'previousFrom' => $this->previousFrom,
            'previousTo' => $this->previousTo,
            'groupKey' => $this->groupKey,
            'currency' => $this->currency,
            'previousAmountCents' => $this->previousAmountCents,
            'currentAmountCents' => $this->currentAmountCents,
            'changePercent' => $this->changePercent,
            'direction' => $this->direction,
            'firedAt' => $this->firedAt,
            'notifiedAt' => $this->notifiedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
