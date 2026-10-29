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

final class ServiceUpdate implements \JsonSerializable
{
    /**
     * @param string|null $name Unique in the organization; at most 120 characters.
     * @param string|null $slug Lower-case letters, digits and dashes; unique. Derived from the name when omitted.
     * @param string|null $description At most 1000 characters.
     * @param float|null $tier Criticality, 1 being the most critical.
     * @param string|null $ownerTeam Free-text owning team; display-only, never routed. At most 120 characters.
     * @param list<string>|null $ownerUserIds Owning org members (at most 20).
     * @param list<ServiceLink>|null $links Dashboards, repositories, docs (at most 20).
     * @param list<string>|null $sloIds Linked SLOs (at most 50).
     * @param list<string>|null $runbookIds Linked runbooks (at most 50).
     * @param list<ServiceMembershipRule>|null $rules Membership rules (at most 20).
     * @param float|null $monthlyBudget Monthly budget in `budgetCurrency`; read by the cost scorecard check.
     * @param string|null $budgetCurrency ISO 4217 code; required with a budget.
     */
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $slug = null,
        public readonly ?string $description = null,
        public readonly ?float $tier = null,
        public readonly ?string $ownerTeam = null,
        public readonly ?array $ownerUserIds = null,
        public readonly ?array $links = null,
        public readonly ?string $onCallScheduleId = null,
        public readonly ?array $sloIds = null,
        public readonly ?array $runbookIds = null,
        public readonly ?array $rules = null,
        public readonly ?float $monthlyBudget = null,
        public readonly ?string $budgetCurrency = null,
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
            name: Coerce::toStringOrNull($data['name'] ?? null),
            slug: Coerce::toStringOrNull($data['slug'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            tier: Coerce::toFloatOrNull($data['tier'] ?? null),
            ownerTeam: Coerce::toStringOrNull($data['ownerTeam'] ?? null),
            ownerUserIds: Coerce::nullable($data['ownerUserIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            links: Coerce::nullable($data['links'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): ServiceLink => ServiceLink::fromArray(Coerce::toArray($item)))),
            onCallScheduleId: Coerce::toStringOrNull($data['onCallScheduleId'] ?? null),
            sloIds: Coerce::nullable($data['sloIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            runbookIds: Coerce::nullable($data['runbookIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            rules: Coerce::nullable($data['rules'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): ServiceMembershipRule => ServiceMembershipRule::fromArray(Coerce::toArray($item)))),
            monthlyBudget: Coerce::toFloatOrNull($data['monthlyBudget'] ?? null),
            budgetCurrency: Coerce::toStringOrNull($data['budgetCurrency'] ?? null),
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
        ];
        if ($this->name !== null) {
            $payload['name'] = $this->name;
        }
        if ($this->slug !== null) {
            $payload['slug'] = $this->slug;
        }
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }
        if ($this->tier !== null) {
            $payload['tier'] = $this->tier;
        }
        if ($this->ownerTeam !== null) {
            $payload['ownerTeam'] = $this->ownerTeam;
        }
        if ($this->ownerUserIds !== null) {
            $payload['ownerUserIds'] = $this->ownerUserIds;
        }
        if ($this->links !== null) {
            $payload['links'] = array_map(static fn (ServiceLink $item): array => $item->toArray(), $this->links);
        }
        if ($this->onCallScheduleId !== null) {
            $payload['onCallScheduleId'] = $this->onCallScheduleId;
        }
        if ($this->sloIds !== null) {
            $payload['sloIds'] = $this->sloIds;
        }
        if ($this->runbookIds !== null) {
            $payload['runbookIds'] = $this->runbookIds;
        }
        if ($this->rules !== null) {
            $payload['rules'] = array_map(static fn (ServiceMembershipRule $item): array => $item->toArray(), $this->rules);
        }
        if ($this->monthlyBudget !== null) {
            $payload['monthlyBudget'] = $this->monthlyBudget;
        }
        if ($this->budgetCurrency !== null) {
            $payload['budgetCurrency'] = $this->budgetCurrency;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
