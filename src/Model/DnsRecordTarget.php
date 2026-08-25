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

final class DnsRecordTarget implements \JsonSerializable
{
    /**
     * @param string $value The target as stored, lowercased with any trailing dot removed.
     * @param 'owned'|'dangling'|'external'|'not-analysed' $classification What can be said about a record target from synced state alone. `owned` — the value is an identity of a synced resource. `dangling` — the value falls inside a provider namespace this workspace manages (an S3 endpoint, a `*.vercel.app` alias) and no synced resource claims it, which is the subdomain-takeover signature. `external` — the value points somewhere there is no declaration for; not a finding. `not-analysed` — the record type carries no host target that is reasoned about (TXT, MX, SOA, CAA, SRV).
     */
    public function __construct(
        public readonly string $value,
        public readonly string $classification,
        public readonly ?DnsTargetResource $resource,
        public readonly ?DnsTargetService $service,
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
            value: Coerce::toString($data['value'] ?? null),
            classification: Coerce::toString($data['classification'] ?? null),
            resource: Coerce::nullable($data['resource'] ?? null, static fn (mixed $value): DnsTargetResource => DnsTargetResource::fromArray(Coerce::toArray($value))),
            service: Coerce::nullable($data['service'] ?? null, static fn (mixed $value): DnsTargetService => DnsTargetService::fromArray(Coerce::toArray($value))),
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
            'value' => $this->value,
            'classification' => $this->classification,
            'resource' => $this->resource?->toArray(),
            'service' => $this->service?->toArray(),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
