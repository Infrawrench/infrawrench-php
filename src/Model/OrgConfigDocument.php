<?php

/*
 * infrawrench/sdk v1.38.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.38.0).
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
 * An organization's configuration. Every section is optional — a document that omits one leaves it
 * entirely alone, in both apply modes.
 */
final class OrgConfigDocument implements \JsonSerializable
{
    /**
     * @param array{organizationId: string, organizationName: string}|null $exportedFrom
     * @param list<OrgConfigBudget>|null $budgets
     * @param list<OrgConfigCustomGraph>|null $customGraphs
     * @param list<OrgConfigWorkflow>|null $workflows
     * @param list<OrgConfigDashboard>|null $dashboards
     * @param list<OrgConfigMetricAlert>|null $metricAlerts
     * @param list<OrgConfigProbe>|null $probes
     * @param list<OrgConfigCostCentre>|null $costCentres
     * @param array{requiredTags: list<array{key: string, allowedValues?: list<string>}>, enforceOnCreate: bool}|null $tagPolicy
     */
    public function __construct(
        public readonly ?int $version = null,
        public readonly ?string $exportedAt = null,
        public readonly ?array $exportedFrom = null,
        public readonly ?array $budgets = null,
        public readonly ?array $customGraphs = null,
        public readonly ?array $workflows = null,
        public readonly ?array $dashboards = null,
        public readonly ?array $metricAlerts = null,
        public readonly ?array $probes = null,
        public readonly ?array $costCentres = null,
        public readonly ?array $tagPolicy = null,
        public readonly ?OrgConfigAlertSettings $alertSettings = null,
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
            version: Coerce::toIntOrNull($data['version'] ?? null),
            exportedAt: Coerce::toStringOrNull($data['exportedAt'] ?? null),
            exportedFrom: Coerce::toArrayOrNull($data['exportedFrom'] ?? null),
            budgets: Coerce::nullable($data['budgets'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): OrgConfigBudget => OrgConfigBudget::fromArray(Coerce::toArray($item)))),
            customGraphs: Coerce::nullable($data['customGraphs'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): OrgConfigCustomGraph => OrgConfigCustomGraph::fromArray(Coerce::toArray($item)))),
            workflows: Coerce::nullable($data['workflows'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): OrgConfigWorkflow => OrgConfigWorkflow::fromArray(Coerce::toArray($item)))),
            dashboards: Coerce::nullable($data['dashboards'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): OrgConfigDashboard => OrgConfigDashboard::fromArray(Coerce::toArray($item)))),
            metricAlerts: Coerce::nullable($data['metricAlerts'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): OrgConfigMetricAlert => OrgConfigMetricAlert::fromArray(Coerce::toArray($item)))),
            probes: Coerce::nullable($data['probes'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): OrgConfigProbe => OrgConfigProbe::fromArray(Coerce::toArray($item)))),
            costCentres: Coerce::nullable($data['costCentres'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): OrgConfigCostCentre => OrgConfigCostCentre::fromArray(Coerce::toArray($item)))),
            tagPolicy: Coerce::toArrayOrNull($data['tagPolicy'] ?? null),
            alertSettings: Coerce::nullable($data['alertSettings'] ?? null, static fn (mixed $value): OrgConfigAlertSettings => OrgConfigAlertSettings::fromArray(Coerce::toArray($value))),
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
        if ($this->version !== null) {
            $payload['version'] = $this->version;
        }
        if ($this->exportedAt !== null) {
            $payload['exportedAt'] = $this->exportedAt;
        }
        if ($this->exportedFrom !== null) {
            $payload['exportedFrom'] = $this->exportedFrom;
        }
        if ($this->budgets !== null) {
            $payload['budgets'] = array_map(static fn (OrgConfigBudget $item): array => $item->toArray(), $this->budgets);
        }
        if ($this->customGraphs !== null) {
            $payload['customGraphs'] = array_map(static fn (OrgConfigCustomGraph $item): array => $item->toArray(), $this->customGraphs);
        }
        if ($this->workflows !== null) {
            $payload['workflows'] = array_map(static fn (OrgConfigWorkflow $item): array => $item->toArray(), $this->workflows);
        }
        if ($this->dashboards !== null) {
            $payload['dashboards'] = array_map(static fn (OrgConfigDashboard $item): array => $item->toArray(), $this->dashboards);
        }
        if ($this->metricAlerts !== null) {
            $payload['metricAlerts'] = array_map(static fn (OrgConfigMetricAlert $item): array => $item->toArray(), $this->metricAlerts);
        }
        if ($this->probes !== null) {
            $payload['probes'] = array_map(static fn (OrgConfigProbe $item): array => $item->toArray(), $this->probes);
        }
        if ($this->costCentres !== null) {
            $payload['costCentres'] = array_map(static fn (OrgConfigCostCentre $item): array => $item->toArray(), $this->costCentres);
        }
        if ($this->tagPolicy !== null) {
            $payload['tagPolicy'] = $this->tagPolicy;
        }
        if ($this->alertSettings !== null) {
            $payload['alertSettings'] = $this->alertSettings->toArray();
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
