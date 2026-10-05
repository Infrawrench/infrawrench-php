<?php

/*
 * infrawrench/sdk v1.55.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.55.0).
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

final class BillingRuleInput implements \JsonSerializable
{
    /**
     * @param int $priority Lower evaluates first. Percentage rules all apply regardless of order (multiplication commutes); reallocation is first-match-wins, so priority decides which one moves a row.
     * @param bool|null $enabled Disabled rules are kept and excluded from every query. Switching a markup off for a quarter is an edit, not a delete.
     * @param list<string>|null $managedAccountIds `tiered` and `expression` only: the managed accounts whose invoices this rule prices. Empty or absent means every customer whose billing rules are on.
     */
    public function __construct(
        public readonly string $name,
        public readonly int $priority,
        public readonly BillingRuleMatch $match,
        public readonly BillingRuleAdjustment $adjustment,
        public readonly ?string $description = null,
        public readonly ?bool $enabled = null,
        public readonly ?array $managedAccountIds = null,
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
            name: Coerce::toString($data['name'] ?? null),
            priority: Coerce::toInt($data['priority'] ?? null),
            match: BillingRuleMatch::fromArray(Coerce::toArray($data['match'] ?? null)),
            adjustment: BillingRuleAdjustment::fromArray(Coerce::toArray($data['adjustment'] ?? null)),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            enabled: Coerce::toBoolOrNull($data['enabled'] ?? null),
            managedAccountIds: Coerce::nullable($data['managedAccountIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
            'name' => $this->name,
            'priority' => $this->priority,
            'match' => $this->match->toArray(),
            'adjustment' => $this->adjustment->toArray(),
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->enabled !== null) {
            $payload['enabled'] = $this->enabled;
        }
        if ($this->managedAccountIds !== null) {
            $payload['managedAccountIds'] = $this->managedAccountIds;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
