<?php

/*
 * infrawrench/sdk v1.78.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.78.0).
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

final class CostAnomalyFeedbackInput implements \JsonSerializable
{
    /**
     * @param 'expected'|'unexpected' $verdict `expected`: planned or known. `unexpected`: a real problem.
     * @param CostAnomalyFeedbackReason::*|null $reason
     * @param bool|null $explain Also record the note as the anomaly's explanation, which publishes it as an annotation on every chart covering the day (the same as POST …/acknowledge). Ignored without a note.
     * @param array{recurrence: CostAnomalyRecurrence::*, scope?: CostAnomalySuppressionScope::*, scopeKey?: string, tagKey?: string, expiresOn?: string}|null $suppress Only with `verdict: expected`. Creates a suppression anchored to the anomaly's day so the same pattern does not alert again; re-sending updates it rather than adding another.
     */
    public function __construct(
        public readonly string $verdict,
        public readonly ?string $reason = null,
        public readonly ?string $note = null,
        public readonly ?bool $explain = null,
        public readonly ?array $suppress = null,
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
            reason: Coerce::toStringOrNull($data['reason'] ?? null),
            note: Coerce::toStringOrNull($data['note'] ?? null),
            explain: Coerce::toBoolOrNull($data['explain'] ?? null),
            suppress: Coerce::toArrayOrNull($data['suppress'] ?? null),
        );
    }

    /**
     * The wire representation, ready for `json_encode`.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $payload = [
            'verdict' => $this->verdict,
        ];
        if ($this->reason !== null) {
            $payload['reason'] = $this->reason;
        }
        if ($this->note !== null) {
            $payload['note'] = $this->note;
        }
        if ($this->explain !== null) {
            $payload['explain'] = $this->explain;
        }
        if ($this->suppress !== null) {
            $payload['suppress'] = $this->suppress;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
