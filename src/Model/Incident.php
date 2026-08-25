<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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

final class Incident implements \JsonSerializable
{
    /**
     * @param 'sev1'|'sev2'|'sev3'|'sev4' $severity Severity in the ordinary sev1..sev4 register. `sev1` is a complete outage; `sev4` is cosmetic and tracked rather than paged.
     * @param 'open'|'mitigated'|'resolved' $status `mitigated` is a real state, not a synonym for resolved: impact has stopped but the incident is still open for follow-up. Keeping it separate is what makes time-to-mitigate a measurement rather than a guess. Resolving runs the resolve path — the change freeze this incident opened is lifted, and the status-page update it posted is closed.
     * @param string $startedAt Backdatable — people declare after they start firefighting.
     * @param list<string> $affectedResourceIds Advisory. Not foreign keys — the claim must survive the resource being deleted.
     * @param list<string> $affectedAccountIds
     * @param string|null $issueUrl Where the write-up was filed, once anyone filed it.
     * @param list<IncidentArtifact> $artifacts
     */
    public function __construct(
        public readonly string $id,
        public readonly string $title,
        public readonly string $severity,
        public readonly string $status,
        public readonly ?string $summary,
        public readonly string $startedAt,
        public readonly ?string $mitigatedAt,
        public readonly ?string $resolvedAt,
        public readonly ?string $declaredByUserId,
        public readonly ?string $declaredByName,
        public readonly ?string $resolvedByUserId,
        public readonly array $affectedResourceIds,
        public readonly array $affectedAccountIds,
        public readonly ?string $issueUrl,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly array $artifacts,
        public readonly int $noteCount,
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
            title: Coerce::toString($data['title'] ?? null),
            severity: Coerce::toString($data['severity'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            summary: Coerce::toStringOrNull($data['summary'] ?? null),
            startedAt: Coerce::toString($data['startedAt'] ?? null),
            mitigatedAt: Coerce::toStringOrNull($data['mitigatedAt'] ?? null),
            resolvedAt: Coerce::toStringOrNull($data['resolvedAt'] ?? null),
            declaredByUserId: Coerce::toStringOrNull($data['declaredByUserId'] ?? null),
            declaredByName: Coerce::toStringOrNull($data['declaredByName'] ?? null),
            resolvedByUserId: Coerce::toStringOrNull($data['resolvedByUserId'] ?? null),
            affectedResourceIds: Coerce::mapList($data['affectedResourceIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            affectedAccountIds: Coerce::mapList($data['affectedAccountIds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            issueUrl: Coerce::toStringOrNull($data['issueUrl'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
            artifacts: Coerce::mapList($data['artifacts'] ?? null, static fn (mixed $item): IncidentArtifact => IncidentArtifact::fromArray(Coerce::toArray($item))),
            noteCount: Coerce::toInt($data['noteCount'] ?? null),
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
            'title' => $this->title,
            'severity' => $this->severity,
            'status' => $this->status,
            'summary' => $this->summary,
            'startedAt' => $this->startedAt,
            'mitigatedAt' => $this->mitigatedAt,
            'resolvedAt' => $this->resolvedAt,
            'declaredByUserId' => $this->declaredByUserId,
            'declaredByName' => $this->declaredByName,
            'resolvedByUserId' => $this->resolvedByUserId,
            'affectedResourceIds' => $this->affectedResourceIds,
            'affectedAccountIds' => $this->affectedAccountIds,
            'issueUrl' => $this->issueUrl,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'artifacts' => array_map(static fn (IncidentArtifact $item): array => $item->toArray(), $this->artifacts),
            'noteCount' => $this->noteCount,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
