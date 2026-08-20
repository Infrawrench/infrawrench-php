<?php

/*
 * infrawrench/sdk v1.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.33.0).
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

final class IncidentPatch implements \JsonSerializable
{
    /**
     * @param 'sev1'|'sev2'|'sev3'|'sev4'|null $severity Severity in the ordinary sev1..sev4 register. `sev1` is a complete outage; `sev4` is cosmetic and tracked rather than paged.
     * @param 'open'|'mitigated'|'resolved'|null $status `mitigated` is a real state, not a synonym for resolved: impact has stopped but the incident is still open for follow-up. Keeping it separate is what makes time-to-mitigate a measurement rather than a guess. Resolving runs the resolve path — the change freeze this incident opened is lifted, and the status-page update it posted is closed.
     * @param list<string>|null $affectedResourceIds
     * @param list<string>|null $affectedAccountIds
     */
    public function __construct(
        public readonly ?string $title = null,
        public readonly ?string $severity = null,
        public readonly ?string $status = null,
        public readonly ?string $summary = null,
        public readonly ?array $affectedResourceIds = null,
        public readonly ?array $affectedAccountIds = null,
        public readonly ?string $issueUrl = null,
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
            title: Coerce::toStringOrNull($data['title'] ?? null),
            severity: Coerce::toStringOrNull($data['severity'] ?? null),
            status: Coerce::toStringOrNull($data['status'] ?? null),
            summary: Coerce::toStringOrNull($data['summary'] ?? null),
            affectedResourceIds: Coerce::nullable($data['affectedResourceIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            affectedAccountIds: Coerce::nullable($data['affectedAccountIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            issueUrl: Coerce::toStringOrNull($data['issueUrl'] ?? null),
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
        if ($this->title !== null) {
            $payload['title'] = $this->title;
        }
        if ($this->severity !== null) {
            $payload['severity'] = $this->severity;
        }
        if ($this->status !== null) {
            $payload['status'] = $this->status;
        }
        if ($this->summary !== null) {
            $payload['summary'] = $this->summary;
        }
        if ($this->affectedResourceIds !== null) {
            $payload['affectedResourceIds'] = $this->affectedResourceIds;
        }
        if ($this->affectedAccountIds !== null) {
            $payload['affectedAccountIds'] = $this->affectedAccountIds;
        }
        if ($this->issueUrl !== null) {
            $payload['issueUrl'] = $this->issueUrl;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
