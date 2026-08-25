<?php

/*
 * infrawrench/sdk v1.35.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.35.0).
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

final class IncidentDeclare implements \JsonSerializable
{
    /**
     * @param 'sev1'|'sev2'|'sev3'|'sev4'|null $severity Severity in the ordinary sev1..sev4 register. `sev1` is a complete outage; `sev4` is cosmetic and tracked rather than paged.
     * @param string|null $startedAt Defaults to now.
     * @param list<string>|null $affectedResourceIds
     * @param list<string>|null $affectedAccountIds
     */
    public function __construct(
        public readonly string $title,
        public readonly ?string $severity = null,
        public readonly ?string $summary = null,
        public readonly ?string $startedAt = null,
        public readonly ?array $affectedResourceIds = null,
        public readonly ?array $affectedAccountIds = null,
        public readonly ?IncidentActions $actions = null,
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
            title: Coerce::toString($data['title'] ?? null),
            severity: Coerce::toStringOrNull($data['severity'] ?? null),
            summary: Coerce::toStringOrNull($data['summary'] ?? null),
            startedAt: Coerce::toStringOrNull($data['startedAt'] ?? null),
            affectedResourceIds: Coerce::nullable($data['affectedResourceIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            affectedAccountIds: Coerce::nullable($data['affectedAccountIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            actions: Coerce::nullable($data['actions'] ?? null, static fn (mixed $value): IncidentActions => IncidentActions::fromArray(Coerce::toArray($value))),
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
            'title' => $this->title,
        ];
        if ($this->severity !== null) {
            $payload['severity'] = $this->severity;
        }
        if ($this->summary !== null) {
            $payload['summary'] = $this->summary;
        }
        if ($this->startedAt !== null) {
            $payload['startedAt'] = $this->startedAt;
        }
        if ($this->affectedResourceIds !== null) {
            $payload['affectedResourceIds'] = $this->affectedResourceIds;
        }
        if ($this->affectedAccountIds !== null) {
            $payload['affectedAccountIds'] = $this->affectedAccountIds;
        }
        if ($this->actions !== null) {
            $payload['actions'] = $this->actions->toArray();
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
