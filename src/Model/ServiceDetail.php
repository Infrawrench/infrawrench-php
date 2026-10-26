<?php

/*
 * infrawrench/sdk v1.84.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.84.0).
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

final class ServiceDetail implements \JsonSerializable
{
    /**
     * @param list<ServiceMember> $members
     * @param list<ServiceMember> $excluded Rule-matched resources the service deliberately leaves out.
     */
    public function __construct(
        public readonly Service $service,
        public readonly array $members,
        public readonly array $excluded,
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
            service: Service::fromArray(Coerce::toArray($data['service'] ?? null)),
            members: Coerce::mapList($data['members'] ?? null, static fn (mixed $item): ServiceMember => ServiceMember::fromArray(Coerce::toArray($item))),
            excluded: Coerce::mapList($data['excluded'] ?? null, static fn (mixed $item): ServiceMember => ServiceMember::fromArray(Coerce::toArray($item))),
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
            'service' => $this->service->toArray(),
            'members' => array_map(static fn (ServiceMember $item): array => $item->toArray(), $this->members),
            'excluded' => array_map(static fn (ServiceMember $item): array => $item->toArray(), $this->excluded),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
