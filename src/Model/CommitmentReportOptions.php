<?php

/*
 * infrawrench/sdk v1.123.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.123.0).
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

final class CommitmentReportOptions implements \JsonSerializable
{
    /**
     * @param list<array{pluginId: PluginId::*, displayName: string, status: 'measured'|'inventory_only'}> $providers
     * @param list<array{id: string, name: string, pluginId: PluginId::*}> $accounts
     * @param list<string> $services
     * @param list<string> $regions
     * @param list<array{commitmentId: string, accountId: string, pluginId: PluginId::*, kind: CommitmentReportKind::*, description: string, state: string}> $commitments
     */
    public function __construct(
        public readonly array $providers,
        public readonly array $accounts,
        public readonly array $services,
        public readonly array $regions,
        public readonly array $commitments,
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
            providers: Coerce::mapList($data['providers'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            accounts: Coerce::mapList($data['accounts'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            services: Coerce::mapList($data['services'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            regions: Coerce::mapList($data['regions'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            commitments: Coerce::mapList($data['commitments'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
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
            'providers' => $this->providers,
            'accounts' => $this->accounts,
            'services' => $this->services,
            'regions' => $this->regions,
            'commitments' => $this->commitments,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
