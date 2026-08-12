<?php

/*
 * infrawrench/sdk v1.17.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.17.0).
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

final class CommitmentHolding implements \JsonSerializable
{
    /**
     * @param PluginId::* $pluginId
     * @param string $commitmentId Provider-native id — the join key against cost rows' commitment dimension (an ARN where billing data carries ARNs, the bare id where it does not).
     * @param 'reservation'|'savings_plan'|'committed_use' $kind
     * @param string|null $scope Provider scope qualifier — an AZ, an instance family, 'Shared'.
     * @param string|null $region Null means the commitment applies across regions (an AWS Compute Savings Plan) — a real state, rendered as 'All regions', not missing data.
     * @param int|null $termDays Provider-reported term length — never derived from the dates, which stop spanning the term once a commitment is split or merged.
     * @param 'all_upfront'|'partial_upfront'|'no_upfront'|'monthly'|null $paymentOption
     * @param string|null $currency Null when the provider reports no money at all for this record.
     * @param float|null $upfrontAmount Null means the provider did not report a price (Azure's list API reports none) — 'not reported', never rendered as 'free'.
     * @param 'hour'|'month'|null $recurringPeriod Atomic with recurringAmount: an amount without a period is a 730× ambiguity.
     * @param float|null $hourlyCommitmentAmount Committed spend per hour — what utilization is measured against.
     * @param list<CommitmentUnitAmount>|null $unitCommitments Committed resource quantities for unit-denominated commitments (GCP CUDs). A record has either this or hourlyCommitmentAmount — the split decides which utilization question is even askable.
     * @param 'active'|'expired'|'queued' $state
     * @param list<CommitmentProviderUtilization>|null $providerUtilization The provider's own utilization aggregates (Azure reservations only), verbatim — never blended with the derived utilization below.
     */
    public function __construct(
        public readonly string $accountId,
        public readonly string $accountName,
        public readonly string $pluginId,
        public readonly string $commitmentId,
        public readonly string $kind,
        public readonly string $description,
        public readonly ?string $scope,
        public readonly ?string $region,
        public readonly ?string $startDate,
        public readonly ?string $endDate,
        public readonly ?int $termDays,
        public readonly ?string $paymentOption,
        public readonly ?string $currency,
        public readonly ?float $upfrontAmount,
        public readonly ?float $recurringAmount,
        public readonly ?string $recurringPeriod,
        public readonly ?float $hourlyCommitmentAmount,
        public readonly ?array $unitCommitments,
        public readonly string $state,
        public readonly ?array $providerUtilization,
        public readonly string $lastSeenAt,
        public readonly CommitmentUtilization $utilization,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            accountName: Coerce::toString($data['accountName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            commitmentId: Coerce::toString($data['commitmentId'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            description: Coerce::toString($data['description'] ?? null),
            scope: Coerce::toStringOrNull($data['scope'] ?? null),
            region: Coerce::toStringOrNull($data['region'] ?? null),
            startDate: Coerce::toStringOrNull($data['startDate'] ?? null),
            endDate: Coerce::toStringOrNull($data['endDate'] ?? null),
            termDays: Coerce::toIntOrNull($data['termDays'] ?? null),
            paymentOption: Coerce::toStringOrNull($data['paymentOption'] ?? null),
            currency: Coerce::toStringOrNull($data['currency'] ?? null),
            upfrontAmount: Coerce::toFloatOrNull($data['upfrontAmount'] ?? null),
            recurringAmount: Coerce::toFloatOrNull($data['recurringAmount'] ?? null),
            recurringPeriod: Coerce::toStringOrNull($data['recurringPeriod'] ?? null),
            hourlyCommitmentAmount: Coerce::toFloatOrNull($data['hourlyCommitmentAmount'] ?? null),
            unitCommitments: Coerce::nullable($data['unitCommitments'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): CommitmentUnitAmount => CommitmentUnitAmount::fromArray(Coerce::toArray($item)))),
            state: Coerce::toString($data['state'] ?? null),
            providerUtilization: Coerce::nullable($data['providerUtilization'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): CommitmentProviderUtilization => CommitmentProviderUtilization::fromArray(Coerce::toArray($item)))),
            lastSeenAt: Coerce::toString($data['lastSeenAt'] ?? null),
            utilization: CommitmentUtilization::fromArray(Coerce::toArray($data['utilization'] ?? null)),
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
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'commitmentId' => $this->commitmentId,
            'kind' => $this->kind,
            'description' => $this->description,
            'scope' => $this->scope,
            'region' => $this->region,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'termDays' => $this->termDays,
            'paymentOption' => $this->paymentOption,
            'currency' => $this->currency,
            'upfrontAmount' => $this->upfrontAmount,
            'recurringAmount' => $this->recurringAmount,
            'recurringPeriod' => $this->recurringPeriod,
            'hourlyCommitmentAmount' => $this->hourlyCommitmentAmount,
            'unitCommitments' => $this->unitCommitments === null ? null : array_map(static fn (CommitmentUnitAmount $item): array => $item->toArray(), $this->unitCommitments),
            'state' => $this->state,
            'providerUtilization' => $this->providerUtilization === null ? null : array_map(static fn (CommitmentProviderUtilization $item): array => $item->toArray(), $this->providerUtilization),
            'lastSeenAt' => $this->lastSeenAt,
            'utilization' => $this->utilization->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
