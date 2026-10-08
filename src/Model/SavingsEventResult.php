<?php

/*
 * infrawrench/sdk v1.77.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.77.0).
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

final class SavingsEventResult implements \JsonSerializable
{
    /**
     * @param string $id A UUID for stored events; `commitment:<accountId>:<currency>` for derived rows.
     * @param SavingsEventKind::* $kind
     * @param SavingsEventSource::* $source
     * @param string $occurredOn The day the action took effect (UTC).
     * @param string|null $endedOn Last day in force, inclusive; null while it still is.
     * @param string|null $resourceId Kept after the resource is deleted.
     * @param string|null $costCentreId Explicit attribution; null means attributed by the allocation rules.
     * @param float|null $projectedMonthlyAmount What the action was projected to save per month.
     * @param int|null $horizonMonths Per-entry horizon override; null uses the org setting.
     * @param string|null $costAnnotationId The cost annotation marking the action on charts.
     * @param RealizedSavingsBasis::* $basis
     * @param 'pending'|'accruing'|'complete'|'ended' $status
     * @param float|null $baselinePerDay Spend per day before the action.
     * @param float|null $currentPerDay Spend per day over the trailing measured days since.
     * @param float|null $realizedToDate Currency units (not cents), in the row's currency.
     * @param float|null $realizedInRange Currency units (not cents), in the row's currency.
     * @param float|null $projectedInRange Projected over the same accrued days in the range.
     * @param string|null $horizonEndsOn Last day a one-off action accrues on; null for recurring ones.
     * @param 'full'|'annotate'|'none' $editable `full`: a manual entry (PUT); `annotate`: an automatic event takes a note, a cost centre, a horizon and an end date (PATCH); `none`: derived rows.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $kind,
        public readonly string $source,
        public readonly string $title,
        public readonly ?string $note,
        public readonly string $occurredOn,
        public readonly ?string $endedOn,
        public readonly ?string $accountId,
        public readonly ?string $accountName,
        public readonly ?string $pluginId,
        public readonly ?string $resourceTypeId,
        public readonly ?string $resourceId,
        public readonly ?string $resourceName,
        public readonly ?string $costCentreId,
        public readonly ?float $projectedMonthlyAmount,
        public readonly ?string $currency,
        public readonly ?int $horizonMonths,
        public readonly ?string $costAnnotationId,
        public readonly ?string $createdByUserId,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly string $basis,
        public readonly string $status,
        public readonly ?string $realizedCurrency,
        public readonly ?float $baselinePerDay,
        public readonly ?float $currentPerDay,
        public readonly ?float $realizedToDate,
        public readonly ?float $realizedInRange,
        public readonly ?float $projectedInRange,
        public readonly int $accruedDays,
        public readonly ?string $horizonEndsOn,
        public readonly ?string $attributedCostCentreId,
        public readonly ?string $attributedCostCentreName,
        public readonly ?SavingsShortfall $shortfall,
        public readonly string $editable,
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
            kind: Coerce::toString($data['kind'] ?? null),
            source: Coerce::toString($data['source'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            note: Coerce::toStringOrNull($data['note'] ?? null),
            occurredOn: Coerce::toString($data['occurredOn'] ?? null),
            endedOn: Coerce::toStringOrNull($data['endedOn'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            resourceName: Coerce::toStringOrNull($data['resourceName'] ?? null),
            costCentreId: Coerce::toStringOrNull($data['costCentreId'] ?? null),
            projectedMonthlyAmount: Coerce::toFloatOrNull($data['projectedMonthlyAmount'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            horizonMonths: Coerce::toIntOrNull($data['horizonMonths'] ?? null),
            costAnnotationId: Coerce::toStringOrNull($data['costAnnotationId'] ?? null),
            createdByUserId: Coerce::toStringOrNull($data['createdByUserId'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
            basis: Coerce::toString($data['basis'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            realizedCurrency: Coerce::toStringOrNull($data['realizedCurrency'] ?? null),
            baselinePerDay: Coerce::toFloatOrNull($data['baselinePerDay'] ?? null),
            currentPerDay: Coerce::toFloatOrNull($data['currentPerDay'] ?? null),
            realizedToDate: Coerce::toFloatOrNull($data['realizedToDate'] ?? null),
            realizedInRange: Coerce::toFloatOrNull($data['realizedInRange'] ?? null),
            projectedInRange: Coerce::toFloatOrNull($data['projectedInRange'] ?? null),
            accruedDays: Coerce::toInt($data['accruedDays'] ?? null),
            horizonEndsOn: Coerce::toStringOrNull($data['horizonEndsOn'] ?? null),
            attributedCostCentreId: Coerce::toStringOrNull($data['attributedCostCentreId'] ?? null),
            attributedCostCentreName: Coerce::toStringOrNull($data['attributedCostCentreName'] ?? null),
            shortfall: Coerce::nullable($data['shortfall'] ?? null, static fn (mixed $value): SavingsShortfall => SavingsShortfall::fromArray(Coerce::toArray($value))),
            editable: Coerce::toString($data['editable'] ?? null),
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
            'kind' => $this->kind,
            'source' => $this->source,
            'title' => $this->title,
            'note' => $this->note,
            'occurredOn' => $this->occurredOn,
            'endedOn' => $this->endedOn,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceId' => $this->resourceId,
            'resourceName' => $this->resourceName,
            'costCentreId' => $this->costCentreId,
            'projectedMonthlyAmount' => $this->projectedMonthlyAmount,
            'currency' => $this->currency,
            'horizonMonths' => $this->horizonMonths,
            'costAnnotationId' => $this->costAnnotationId,
            'createdByUserId' => $this->createdByUserId,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'basis' => $this->basis,
            'status' => $this->status,
            'realizedCurrency' => $this->realizedCurrency,
            'baselinePerDay' => $this->baselinePerDay,
            'currentPerDay' => $this->currentPerDay,
            'realizedToDate' => $this->realizedToDate,
            'realizedInRange' => $this->realizedInRange,
            'projectedInRange' => $this->projectedInRange,
            'accruedDays' => $this->accruedDays,
            'horizonEndsOn' => $this->horizonEndsOn,
            'attributedCostCentreId' => $this->attributedCostCentreId,
            'attributedCostCentreName' => $this->attributedCostCentreName,
            'shortfall' => $this->shortfall?->toArray(),
            'editable' => $this->editable,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
