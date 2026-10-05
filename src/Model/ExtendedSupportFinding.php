<?php

/*
 * infrawrench/sdk v1.74.1 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.74.1).
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

final class ExtendedSupportFinding implements \JsonSerializable
{
    /**
     * @param string $resourceId Infrawrench resource id.
     * @param PluginId::* $pluginId
     * @param string $releaseId The matched support-calendar entry, unique within the resource type.
     * @param 'end-of-life'|'surcharged'|'unsupported'|'upcoming' $status `surcharged`: past standard support and paying for extended support. `unsupported`: past standard support with no surcharge (no paid extension, or not enrolled), so a forced upgrade is pending. `end-of-life`: past the end of extended support too. `upcoming`: standard support ends within the organization's lead time.
     * @param string $standardSupportEnds Last day of standard support, YYYY-MM-DD.
     * @param string $surchargeStartsOn First day the surcharge applies, YYYY-MM-DD.
     * @param int $daysUntilSurcharge Zero or negative once it has started.
     * @param string|null $extendedSupportEnds Last day of extended support, after which the provider upgrades it.
     * @param bool $charged False when there is no paid extension or the resource is not enrolled.
     * @param float|null $quantity Billable units (vCPUs, nodes); null when unknown.
     * @param 'cluster-hour'|'vcpu-hour'|'vcore-hour'|'node-hour'|'instance-hour'|'acu-hour'|null $unit
     * @param string|null $tierLabel The rate tier in force (or first, if upcoming).
     * @param float|null $monthlySurcharge Monthly surcharge an upgrade removes (projected for `upcoming`). Null means no figure.
     * @param float|null $listMonthlySurcharge The list-price figure.
     * @param 'billed'|'billed-share'|'list-price'|'unpriced' $costBasis Where `monthlySurcharge` came from: `billed` (the provider's billing, attributable to this resource alone), `billed-share` (a billed line shared by several matching resources, split by list-price weight), `list-price` (computed from published rates), or `unpriced` (no figure).
     * @param list<string> $billedLineItems Provider line items behind a billed figure.
     * @param array{from: string, label: string, monthlySurcharge: float|null}|null $nextTier The next, higher rate tier, when the rate is scheduled to rise.
     */
    public function __construct(
        public readonly string $resourceId,
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly string $resourceTypeId,
        public readonly string $resourceTypeName,
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $displayName,
        public readonly ?string $externalId,
        public readonly ?string $region,
        public readonly string $releaseId,
        public readonly string $product,
        public readonly ?string $engine,
        public readonly string $currentVersion,
        public readonly string $targetVersion,
        public readonly string $status,
        public readonly string $standardSupportEnds,
        public readonly string $surchargeStartsOn,
        public readonly int $daysUntilSurcharge,
        public readonly ?string $extendedSupportEnds,
        public readonly ?int $daysUntilForcedUpgrade,
        public readonly bool $charged,
        public readonly ?float $quantity,
        public readonly ?string $unit,
        public readonly ?string $currency,
        public readonly ?string $tierLabel,
        public readonly ?float $monthlySurcharge,
        public readonly ?float $listMonthlySurcharge,
        public readonly string $costBasis,
        public readonly array $billedLineItems,
        public readonly ?array $nextTier,
        public readonly ?string $priceNote,
        public readonly ?string $pricingUrl,
        public readonly string $upgradeUrl,
        public readonly ?string $note,
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
            resourceId: Coerce::toString($data['resourceId'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            pluginName: Coerce::toString($data['pluginName'] ?? null),
            resourceTypeId: Coerce::toString($data['resourceTypeId'] ?? null),
            resourceTypeName: Coerce::toString($data['resourceTypeName'] ?? null),
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toString($data['accountName'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            externalId: Coerce::toStringOrNull($data['externalId'] ?? null),
            region: Coerce::toStringOrNull($data['region'] ?? null),
            releaseId: Coerce::toString($data['releaseId'] ?? null),
            product: Coerce::toString($data['product'] ?? null),
            engine: Coerce::toStringOrNull($data['engine'] ?? null),
            currentVersion: Coerce::toString($data['currentVersion'] ?? null),
            targetVersion: Coerce::toString($data['targetVersion'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            standardSupportEnds: Coerce::toString($data['standardSupportEnds'] ?? null),
            surchargeStartsOn: Coerce::toString($data['surchargeStartsOn'] ?? null),
            daysUntilSurcharge: Coerce::toInt($data['daysUntilSurcharge'] ?? null),
            extendedSupportEnds: Coerce::toStringOrNull($data['extendedSupportEnds'] ?? null),
            daysUntilForcedUpgrade: Coerce::toIntOrNull($data['daysUntilForcedUpgrade'] ?? null),
            charged: Coerce::toBool($data['charged'] ?? null),
            quantity: Coerce::toFloatOrNull($data['quantity'] ?? null),
            unit: Coerce::toStringOrNull($data['unit'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            tierLabel: Coerce::toStringOrNull($data['tierLabel'] ?? null),
            monthlySurcharge: Coerce::toFloatOrNull($data['monthlySurcharge'] ?? null),
            listMonthlySurcharge: Coerce::toFloatOrNull($data['listMonthlySurcharge'] ?? null),
            costBasis: Coerce::toString($data['costBasis'] ?? null),
            billedLineItems: Coerce::mapList($data['billedLineItems'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            nextTier: Coerce::toArrayOrNull($data['nextTier'] ?? null),
            priceNote: Coerce::toStringOrNull($data['priceNote'] ?? null),
            pricingUrl: Coerce::toStringOrNull($data['pricingUrl'] ?? null),
            upgradeUrl: Coerce::toString($data['upgradeUrl'] ?? null),
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
        return [
            'resourceId' => $this->resourceId,
            'pluginId' => $this->pluginId,
            'pluginName' => $this->pluginName,
            'resourceTypeId' => $this->resourceTypeId,
            'resourceTypeName' => $this->resourceTypeName,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'displayName' => $this->displayName,
            'externalId' => $this->externalId,
            'region' => $this->region,
            'releaseId' => $this->releaseId,
            'product' => $this->product,
            'engine' => $this->engine,
            'currentVersion' => $this->currentVersion,
            'targetVersion' => $this->targetVersion,
            'status' => $this->status,
            'standardSupportEnds' => $this->standardSupportEnds,
            'surchargeStartsOn' => $this->surchargeStartsOn,
            'daysUntilSurcharge' => $this->daysUntilSurcharge,
            'extendedSupportEnds' => $this->extendedSupportEnds,
            'daysUntilForcedUpgrade' => $this->daysUntilForcedUpgrade,
            'charged' => $this->charged,
            'quantity' => $this->quantity,
            'unit' => $this->unit,
            'currency' => $this->currency,
            'tierLabel' => $this->tierLabel,
            'monthlySurcharge' => $this->monthlySurcharge,
            'listMonthlySurcharge' => $this->listMonthlySurcharge,
            'costBasis' => $this->costBasis,
            'billedLineItems' => $this->billedLineItems,
            'nextTier' => $this->nextTier,
            'priceNote' => $this->priceNote,
            'pricingUrl' => $this->pricingUrl,
            'upgradeUrl' => $this->upgradeUrl,
            'note' => $this->note,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
