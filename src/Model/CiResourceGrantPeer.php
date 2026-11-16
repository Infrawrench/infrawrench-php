<?php

/*
 * infrawrench/sdk v1.114.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.114.0).
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

final class CiResourceGrantPeer implements \JsonSerializable
{
    /**
     * @param string $pluginId The plugin the resource is lent as, one its type has a peer integration with (a managed cluster as `kubernetes`). Pipelines name it in `connections:` by the grant's CI name.
     * @param bool $lend `connections: [<ciName>]` lends it. Separate from running jobs on it, which lends nothing.
     * @param list<'vm'|'container'|'build'|'host'|'cluster'> $jobKinds Cloud jobs (`cloud: <pluginId>/<kind>`) that may run on it. Empty for none.
     * @param list<string> $jobRegions Where else a job may run with `cloud.region` (a cluster's namespaces), besides where each kind was checked. Empty: only there.
     * @param array<string, CiPreflightRecord> $preflight
     */
    public function __construct(
        public readonly string $pluginId,
        public readonly string $pluginName,
        public readonly bool $lend,
        public readonly array $jobKinds,
        public readonly int $maxConcurrentJobs,
        public readonly int $maxJobMinutes,
        public readonly array $jobRegions,
        public readonly array $preflight,
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
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            pluginName: Coerce::toString($data['pluginName'] ?? null),
            lend: Coerce::toBool($data['lend'] ?? null),
            jobKinds: Coerce::mapList($data['jobKinds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            maxConcurrentJobs: Coerce::toInt($data['maxConcurrentJobs'] ?? null),
            maxJobMinutes: Coerce::toInt($data['maxJobMinutes'] ?? null),
            jobRegions: Coerce::mapList($data['jobRegions'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            preflight: Coerce::mapValues($data['preflight'] ?? null, static fn (mixed $item): CiPreflightRecord => CiPreflightRecord::fromArray(Coerce::toArray($item))),
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
            'pluginId' => $this->pluginId,
            'pluginName' => $this->pluginName,
            'lend' => $this->lend,
            'jobKinds' => $this->jobKinds,
            'maxConcurrentJobs' => $this->maxConcurrentJobs,
            'maxJobMinutes' => $this->maxJobMinutes,
            'jobRegions' => $this->jobRegions,
            'preflight' => array_map(static fn (CiPreflightRecord $item): array => $item->toArray(), $this->preflight),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
