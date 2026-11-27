<?php

/*
 * infrawrench/sdk v1.136.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.136.0).
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
 * Lists AND-compose; values within a list OR. An absent list does not filter. `commitmentTypes`
 * and `commitmentIds` narrow the commitment side (covered usage and unused fees) only: uncovered
 * usage stays in, because it is the rest of the coverage denominator.
 */
final class CommitmentReportFilters implements \JsonSerializable
{
    /**
     * @param list<string>|null $providers Plugin ids, as `report-options` lists them (`aws`, `azure`).
     * @param list<CommitmentReportKind::*>|null $commitmentTypes Narrows the commitment side to holdings of these kinds.
     * @param list<string>|null $services Provider service names, as `report-options` lists them.
     * @param list<string>|null $accountIds Connected account ids.
     * @param list<string>|null $regions Provider regions, as `report-options` lists them.
     * @param list<string>|null $commitmentIds Provider-native commitment ids, as `report-options` lists them. Narrows the commitment side to those holdings.
     */
    public function __construct(
        public readonly ?array $providers = null,
        public readonly ?array $commitmentTypes = null,
        public readonly ?array $services = null,
        public readonly ?array $accountIds = null,
        public readonly ?array $regions = null,
        public readonly ?array $commitmentIds = null,
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
            providers: Coerce::nullable($data['providers'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            commitmentTypes: Coerce::nullable($data['commitmentTypes'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            services: Coerce::nullable($data['services'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            accountIds: Coerce::nullable($data['accountIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            regions: Coerce::nullable($data['regions'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            commitmentIds: Coerce::nullable($data['commitmentIds'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
        if ($this->providers !== null) {
            $payload['providers'] = $this->providers;
        }
        if ($this->commitmentTypes !== null) {
            $payload['commitmentTypes'] = $this->commitmentTypes;
        }
        if ($this->services !== null) {
            $payload['services'] = $this->services;
        }
        if ($this->accountIds !== null) {
            $payload['accountIds'] = $this->accountIds;
        }
        if ($this->regions !== null) {
            $payload['regions'] = $this->regions;
        }
        if ($this->commitmentIds !== null) {
            $payload['commitmentIds'] = $this->commitmentIds;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
