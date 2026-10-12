<?php

/*
 * infrawrench/sdk v1.81.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.81.0).
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

final class Seat implements \JsonSerializable
{
    /**
     * @param string $id Infrawrench seat id; the handle for removal.
     * @param PluginId::* $pluginId
     * @param string $memberId Provider-native member id.
     * @param string $seatKey Empty unless one member holds several seats on the account.
     * @param 'ai-coding'|'ai-assistant'|'source-control'|'identity'|'other' $category What the seat is for. Two seats one person holds in the same category on different products are a duplicate finding; `other` never is.
     * @param float|null $monthlyPrice Per month; null when unpriced.
     * @param 'billing'|'catalog'|'configured'|'list-price'|null $priceSource `billing`/`catalog`: read from the provider. `configured`: the price set on the account. `list-price`: the provider's published list price, an estimate.
     * @param 'last-activity'|'last-login'|'usage-window'|'none' $activityBasis How the provider evidences use: `last-activity` (last use of the product), `last-login` (last sign-in), `usage-window` (per-day usage over `activityWindowDays`), or `none` (no evidence; never flagged inactive).
     * @param string $activitySource Plain-English description of the evidence.
     * @param bool $removable Whether the in-app Remove can remove it.
     * @param array{seatType: string, price: array<string, mixed>, reason: string}|null $downgrade
     * @param array<string, string> $context
     * @param array{resourceTypeId: string, externalId: string}|null $resource
     * @param 'active'|'inactive'|'new'|'unknown'|'pending-removal' $status `inactive`: the evidence covers the threshold and shows no use. `new`: assigned inside the threshold and not used yet. `unknown`: the evidence cannot cover the threshold. `pending-removal`: already being removed at the provider.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly string $memberId,
        public readonly string $seatKey,
        public readonly ?string $name,
        public readonly ?string $email,
        public readonly ?string $login,
        public readonly string $product,
        public readonly string $category,
        public readonly string $seatType,
        public readonly ?float $monthlyPrice,
        public readonly ?string $currency,
        public readonly ?string $priceSource,
        public readonly ?string $priceNote,
        public readonly string $activityBasis,
        public readonly ?string $lastActiveAt,
        public readonly ?int $activityWindowDays,
        public readonly string $activitySource,
        public readonly ?string $assignedAt,
        public readonly ?string $pendingRemovalOn,
        public readonly bool $removable,
        public readonly ?string $removalNote,
        public readonly ?array $downgrade,
        public readonly array $context,
        public readonly ?array $resource,
        public readonly string $lastSeenAt,
        public readonly string $status,
        public readonly ?int $daysInactive,
        public readonly bool $neverActive,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toString($data['accountName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            pluginName: Coerce::toString($data['pluginName'] ?? null),
            memberId: Coerce::toString($data['memberId'] ?? null),
            seatKey: Coerce::toString($data['seatKey'] ?? null),
            name: Coerce::toStringOrNull($data['name'] ?? null),
            email: Coerce::toStringOrNull($data['email'] ?? null),
            login: Coerce::toStringOrNull($data['login'] ?? null),
            product: Coerce::toString($data['product'] ?? null),
            category: Coerce::toString($data['category'] ?? null),
            seatType: Coerce::toString($data['seatType'] ?? null),
            monthlyPrice: Coerce::toFloatOrNull($data['monthlyPrice'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            priceSource: Coerce::toStringOrNull($data['priceSource'] ?? null),
            priceNote: Coerce::toStringOrNull($data['priceNote'] ?? null),
            activityBasis: Coerce::toString($data['activityBasis'] ?? null),
            lastActiveAt: Coerce::toStringOrNull($data['lastActiveAt'] ?? null),
            activityWindowDays: Coerce::toIntOrNull($data['activityWindowDays'] ?? null),
            activitySource: Coerce::toString($data['activitySource'] ?? null),
            assignedAt: Coerce::toStringOrNull($data['assignedAt'] ?? null),
            pendingRemovalOn: Coerce::toStringOrNull($data['pendingRemovalOn'] ?? null),
            removable: Coerce::toBool($data['removable'] ?? null),
            removalNote: Coerce::toStringOrNull($data['removalNote'] ?? null),
            downgrade: Coerce::toArrayOrNull($data['downgrade'] ?? null),
            context: Coerce::mapValues($data['context'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            resource: Coerce::toArrayOrNull($data['resource'] ?? null),
            lastSeenAt: Coerce::toString($data['lastSeenAt'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            daysInactive: Coerce::toIntOrNull($data['daysInactive'] ?? null),
            neverActive: Coerce::toBool($data['neverActive'] ?? null),
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
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'pluginName' => $this->pluginName,
            'memberId' => $this->memberId,
            'seatKey' => $this->seatKey,
            'name' => $this->name,
            'email' => $this->email,
            'login' => $this->login,
            'product' => $this->product,
            'category' => $this->category,
            'seatType' => $this->seatType,
            'monthlyPrice' => $this->monthlyPrice,
            'currency' => $this->currency,
            'priceSource' => $this->priceSource,
            'priceNote' => $this->priceNote,
            'activityBasis' => $this->activityBasis,
            'lastActiveAt' => $this->lastActiveAt,
            'activityWindowDays' => $this->activityWindowDays,
            'activitySource' => $this->activitySource,
            'assignedAt' => $this->assignedAt,
            'pendingRemovalOn' => $this->pendingRemovalOn,
            'removable' => $this->removable,
            'removalNote' => $this->removalNote,
            'downgrade' => $this->downgrade,
            'context' => $this->context,
            'resource' => $this->resource,
            'lastSeenAt' => $this->lastSeenAt,
            'status' => $this->status,
            'daysInactive' => $this->daysInactive,
            'neverActive' => $this->neverActive,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
