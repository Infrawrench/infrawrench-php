<?php

/*
 * infrawrench/sdk v1.135.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.135.0).
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

final class CiResourceGrantPeerInput implements \JsonSerializable
{
    /**
     * @param bool $lend Lend it to jobs that name it in `connections:`.
     * @param list<'vm'|'container'|'build'|'host'|'cluster'> $jobKinds Cloud jobs that may run on it. A kind turned on is checked first, through the peer, and refused when the check fails.
     * @param list<string> $jobRegions Where else jobs may run with `cloud.region`, each checked through the peer when added. Empty: only where each kind was checked.
     */
    public function __construct(
        public readonly string $pluginId,
        public readonly bool $lend,
        public readonly array $jobKinds,
        public readonly int $maxConcurrentJobs,
        public readonly int $maxJobMinutes,
        public readonly array $jobRegions,
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
            lend: Coerce::toBool($data['lend'] ?? null),
            jobKinds: Coerce::mapList($data['jobKinds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            maxConcurrentJobs: Coerce::toInt($data['maxConcurrentJobs'] ?? null),
            maxJobMinutes: Coerce::toInt($data['maxJobMinutes'] ?? null),
            jobRegions: Coerce::mapList($data['jobRegions'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
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
            'lend' => $this->lend,
            'jobKinds' => $this->jobKinds,
            'maxConcurrentJobs' => $this->maxConcurrentJobs,
            'maxJobMinutes' => $this->maxJobMinutes,
            'jobRegions' => $this->jobRegions,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
