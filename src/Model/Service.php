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

final class Service implements \JsonSerializable
{
    /**
     * @param string $name Unique in the organization; at most 120 characters.
     * @param string $slug Lower-case letters, digits and dashes; unique. Derived from the name when omitted.
     * @param string|null $description At most 1000 characters.
     * @param float|null $tier Criticality, 1 being the most critical.
     * @param string|null $ownerTeam Free-text owning team; display-only, never routed. At most 120 characters.
     * @param list<string> $ownerUserIds Owning org members (at most 20).
     * @param list<ServiceLink> $links Dashboards, repositories, docs (at most 20).
     * @param list<string> $sloIds Linked SLOs (at most 50).
     * @param list<string> $runbookIds Linked runbooks (at most 50).
     * @param list<ServiceMembershipRule> $rules Membership rules (at most 20).
     * @param float|null $monthlyBudget Monthly budget in `budgetCurrency`; read by the cost scorecard check.
     * @param string|null $budgetCurrency ISO 4217 code; required with a budget.
     * @param list<array{userId: string, name: string|null, email: string|null}> $owners
     * @param int $memberCount Resolved members: explicit plus rule-matched.
     * @param list<ServiceScoreBadge> $scores Current standing on each enabled scorecard.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $slug,
        public readonly ?string $description,
        public readonly ?float $tier,
        public readonly ?string $ownerTeam,
        public readonly array $ownerUserIds,
        public readonly array $links,
        public readonly ?string $onCallScheduleId,
        public readonly array $sloIds,
        public readonly array $runbookIds,
        public readonly array $rules,
        public readonly ?float $monthlyBudget,
        public readonly ?string $budgetCurrency,
        public readonly array $owners,
        public readonly ?string $onCallScheduleName,
        public readonly int $memberCount,
        public readonly array $scores,
        public readonly string $createdAt,
        public readonly string $updatedAt,
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
            name: Coerce::toString($data['name'] ?? null),
            slug: Coerce::toString($data['slug'] ?? null),
            description: Coerce::toStringOrNull($data['description'] ?? null),
            tier: Coerce::toFloatOrNull($data['tier'] ?? null),
            ownerTeam: Coerce::toStringOrNull($data['ownerTeam'] ?? null),
            ownerUserIds: Coerce::mapList($data['ownerUserIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            links: Coerce::mapList($data['links'] ?? null, static fn (mixed $item): ServiceLink => ServiceLink::fromArray(Coerce::toArray($item))),
            onCallScheduleId: Coerce::toStringOrNull($data['onCallScheduleId'] ?? null),
            sloIds: Coerce::mapList($data['sloIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            runbookIds: Coerce::mapList($data['runbookIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            rules: Coerce::mapList($data['rules'] ?? null, static fn (mixed $item): ServiceMembershipRule => ServiceMembershipRule::fromArray(Coerce::toArray($item))),
            monthlyBudget: Coerce::toFloatOrNull($data['monthlyBudget'] ?? null),
            budgetCurrency: Coerce::toStringOrNull($data['budgetCurrency'] ?? null),
            owners: Coerce::mapList($data['owners'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            onCallScheduleName: Coerce::toStringOrNull($data['onCallScheduleName'] ?? null),
            memberCount: Coerce::toInt($data['memberCount'] ?? null),
            scores: Coerce::mapList($data['scores'] ?? null, static fn (mixed $item): ServiceScoreBadge => ServiceScoreBadge::fromArray(Coerce::toArray($item))),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
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
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'tier' => $this->tier,
            'ownerTeam' => $this->ownerTeam,
            'ownerUserIds' => $this->ownerUserIds,
            'links' => array_map(static fn (ServiceLink $item): array => $item->toArray(), $this->links),
            'onCallScheduleId' => $this->onCallScheduleId,
            'sloIds' => $this->sloIds,
            'runbookIds' => $this->runbookIds,
            'rules' => array_map(static fn (ServiceMembershipRule $item): array => $item->toArray(), $this->rules),
            'monthlyBudget' => $this->monthlyBudget,
            'budgetCurrency' => $this->budgetCurrency,
            'owners' => $this->owners,
            'onCallScheduleName' => $this->onCallScheduleName,
            'memberCount' => $this->memberCount,
            'scores' => array_map(static fn (ServiceScoreBadge $item): array => $item->toArray(), $this->scores),
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
