<?php

/*
 * infrawrench/sdk v1.67.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.67.0).
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
 * Whether somebody marked this finding expected (planned or known) or unexpected (a real problem),
 * with who and when; null while nobody has. See POST /costs/anomalies/{anomalyId}/feedback.
 *
 * The API may send `null` in place of this object.
 */
final class CostAnomalyFeedback implements \JsonSerializable
{
    /**
     * @param 'expected'|'unexpected' $verdict
     * @param CostAnomalyFeedbackReason::* $reason
     * @param string $at When the current verdict was recorded; restamped on every save.
     * @param string|null $byName Display name (or email) of whoever gave the verdict, while they are still known.
     * @param string|null $suppressionId The suppression this verdict created, or null (none was asked for, or it was deleted).
     */
    public function __construct(
        public readonly string $verdict,
        public readonly string $reason,
        public readonly ?string $note,
        public readonly string $at,
        public readonly ?string $byUserId,
        public readonly ?string $byName,
        public readonly ?string $suppressionId,
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
            verdict: Coerce::toString($data['verdict'] ?? null),
            reason: Coerce::toString($data['reason'] ?? null),
            note: Coerce::toStringOrNull($data['note'] ?? null),
            at: Coerce::toString($data['at'] ?? null),
            byUserId: Coerce::toStringOrNull($data['byUserId'] ?? null),
            byName: Coerce::toStringOrNull($data['byName'] ?? null),
            suppressionId: Coerce::toStringOrNull($data['suppressionId'] ?? null),
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
            'verdict' => $this->verdict,
            'reason' => $this->reason,
            'note' => $this->note,
            'at' => $this->at,
            'byUserId' => $this->byUserId,
            'byName' => $this->byName,
            'suppressionId' => $this->suppressionId,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
