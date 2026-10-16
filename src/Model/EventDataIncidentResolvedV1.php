<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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
 * `data` of a `incident.resolved` event, version 1. A declared incident was resolved.
 *
 * Spec schema: `EventData_incident_resolved_v1`.
 */
final class EventDataIncidentResolvedV1 implements \JsonSerializable
{
    /**
     * @param string $incidentId Incident id.
     * @param string $title Incident title.
     * @param 'sev1'|'sev2'|'sev3'|'sev4' $incidentSeverity Declared severity.
     * @param string $status Status after this change.
     * @param string|null $summary Summary, if one was given.
     * @param string $startedAt When the incident started.
     * @param string|null $resolvedAt When it was resolved.
     * @param string|null $declaredByName Who declared it.
     * @param list<string> $affectedResourceIds Resources named as affected.
     */
    public function __construct(
        public readonly string $incidentId,
        public readonly string $title,
        public readonly string $incidentSeverity,
        public readonly string $status,
        public readonly ?string $summary,
        public readonly string $startedAt,
        public readonly ?string $resolvedAt,
        public readonly ?string $declaredByName,
        public readonly array $affectedResourceIds,
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
            incidentId: Coerce::toString($data['incidentId'] ?? null),
            title: Coerce::toString($data['title'] ?? null),
            incidentSeverity: Coerce::toString($data['incidentSeverity'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            summary: Coerce::toStringOrNull($data['summary'] ?? null),
            startedAt: Coerce::toString($data['startedAt'] ?? null),
            resolvedAt: Coerce::toStringOrNull($data['resolvedAt'] ?? null),
            declaredByName: Coerce::toStringOrNull($data['declaredByName'] ?? null),
            affectedResourceIds: Coerce::mapList($data['affectedResourceIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'incidentId' => $this->incidentId,
            'title' => $this->title,
            'incidentSeverity' => $this->incidentSeverity,
            'status' => $this->status,
            'summary' => $this->summary,
            'startedAt' => $this->startedAt,
            'resolvedAt' => $this->resolvedAt,
            'declaredByName' => $this->declaredByName,
            'affectedResourceIds' => $this->affectedResourceIds,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
