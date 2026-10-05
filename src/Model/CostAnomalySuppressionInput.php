<?php

/*
 * infrawrench/sdk v1.71.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.71.0).
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

final class CostAnomalySuppressionInput implements \JsonSerializable
{
    /**
     * @param CostAnomalySuppressionScope::* $scope
     * @param string $scopeKey The scope's value: a plugin id (`provider`), a service name, an account id, a tag value, or a cost centre id. Accounts and cost centres must belong to the organization.
     * @param CostAnomalyRecurrence::* $recurrence
     * @param string $anchorDay The day the pattern is anchored to.
     * @param string $expiresOn Last day covered, inclusive. At most three years after `startsOn`, and not before it.
     * @param string|null $tagKey Required when `scope` is `tag`.
     * @param string|null $startsOn First day covered. Defaults to `anchorDay`.
     * @param CostAnomalyFeedbackReason::*|null $reason
     */
    public function __construct(
        public readonly string $scope,
        public readonly string $scopeKey,
        public readonly string $recurrence,
        public readonly string $anchorDay,
        public readonly string $expiresOn,
        public readonly ?string $tagKey = null,
        public readonly ?string $startsOn = null,
        public readonly ?string $reason = null,
        public readonly ?string $note = null,
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
            scope: Coerce::toString($data['scope'] ?? null),
            scopeKey: Coerce::toString($data['scopeKey'] ?? null),
            recurrence: Coerce::toString($data['recurrence'] ?? null),
            anchorDay: Coerce::toString($data['anchorDay'] ?? null),
            expiresOn: Coerce::toString($data['expiresOn'] ?? null),
            tagKey: Coerce::toStringOrNull($data['tagKey'] ?? null),
            startsOn: Coerce::toStringOrNull($data['startsOn'] ?? null),
            reason: Coerce::toStringOrNull($data['reason'] ?? null),
            note: Coerce::toStringOrNull($data['note'] ?? null),
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
            'scope' => $this->scope,
            'scopeKey' => $this->scopeKey,
            'recurrence' => $this->recurrence,
            'anchorDay' => $this->anchorDay,
            'expiresOn' => $this->expiresOn,
        ];
        if ($this->tagKey !== null) {
            $payload['tagKey'] = $this->tagKey;
        }
        if ($this->startsOn !== null) {
            $payload['startsOn'] = $this->startsOn;
        }
        if ($this->reason !== null) {
            $payload['reason'] = $this->reason;
        }
        if ($this->note !== null) {
            $payload['note'] = $this->note;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
