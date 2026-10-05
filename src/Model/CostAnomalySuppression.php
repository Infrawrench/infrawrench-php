<?php

/*
 * infrawrench/sdk v1.69.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.69.0).
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

/** The API may send `null` in place of this object. */
final class CostAnomalySuppression implements \JsonSerializable
{
    /**
     * @param CostAnomalySuppressionScope::* $scope
     * @param string|null $scopeLabel The account or cost centre name for id-valued scopes; null otherwise.
     * @param CostAnomalyRecurrence::* $recurrence
     * @param CostAnomalyFeedbackReason::* $reason
     * @param string|null $sourceAnomalyId The anomaly whose `expected` verdict created this; null for one made by hand.
     * @param bool $active Whether it still covers today or a later day. Read-only.
     * @param int $suppressedCount How many detected findings it has suppressed so far. Read-only.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $scope,
        public readonly string $scopeKey,
        public readonly ?string $tagKey,
        public readonly ?string $scopeLabel,
        public readonly string $recurrence,
        public readonly string $anchorDay,
        public readonly string $startsOn,
        public readonly string $expiresOn,
        public readonly string $reason,
        public readonly ?string $note,
        public readonly ?string $sourceAnomalyId,
        public readonly ?string $createdByUserId,
        public readonly ?string $createdByName,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly bool $active,
        public readonly int $suppressedCount,
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
            scope: Coerce::toString($data['scope'] ?? null),
            scopeKey: Coerce::toString($data['scopeKey'] ?? null),
            tagKey: Coerce::toStringOrNull($data['tagKey'] ?? null),
            scopeLabel: Coerce::toStringOrNull($data['scopeLabel'] ?? null),
            recurrence: Coerce::toString($data['recurrence'] ?? null),
            anchorDay: Coerce::toString($data['anchorDay'] ?? null),
            startsOn: Coerce::toString($data['startsOn'] ?? null),
            expiresOn: Coerce::toString($data['expiresOn'] ?? null),
            reason: Coerce::toString($data['reason'] ?? null),
            note: Coerce::toStringOrNull($data['note'] ?? null),
            sourceAnomalyId: Coerce::toStringOrNull($data['sourceAnomalyId'] ?? null),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
            createdByName: Coerce::toStringOrNull($data['createdByName'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
            active: Coerce::toBool($data['active'] ?? null),
            suppressedCount: Coerce::toInt($data['suppressedCount'] ?? null),
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
            'scope' => $this->scope,
            'scopeKey' => $this->scopeKey,
            'tagKey' => $this->tagKey,
            'scopeLabel' => $this->scopeLabel,
            'recurrence' => $this->recurrence,
            'anchorDay' => $this->anchorDay,
            'startsOn' => $this->startsOn,
            'expiresOn' => $this->expiresOn,
            'reason' => $this->reason,
            'note' => $this->note,
            'sourceAnomalyId' => $this->sourceAnomalyId,
            'createdByUserId' => $this->createdByUserId,
            'createdByName' => $this->createdByName,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'active' => $this->active,
            'suppressedCount' => $this->suppressedCount,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
