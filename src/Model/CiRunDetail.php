<?php

/*
 * infrawrench/sdk v1.108.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.108.0).
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

final class CiRunDetail implements \JsonSerializable
{
    /**
     * @param list<CiJobOutput>|null $jobs
     * @param list<CiCloudJob>|null $cloudJobs Where each of its cloud jobs ran. Absent when it has none.
     */
    public function __construct(
        public readonly CiRun $run,
        public readonly ?array $jobs,
        public readonly ?array $cloudJobs = null,
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
            run: CiRun::fromArray(Coerce::toArray($data['run'] ?? null)),
            jobs: Coerce::nullable($data['jobs'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): CiJobOutput => CiJobOutput::fromArray(Coerce::toArray($item)))),
            cloudJobs: Coerce::nullable($data['cloudJobs'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): CiCloudJob => CiCloudJob::fromArray(Coerce::toArray($item)))),
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
            'run' => $this->run->toArray(),
            'jobs' => $this->jobs === null ? null : array_map(static fn (CiJobOutput $item): array => $item->toArray(), $this->jobs),
        ];
        if ($this->cloudJobs !== null) {
            $payload['cloudJobs'] = array_map(static fn (CiCloudJob $item): array => $item->toArray(), $this->cloudJobs);
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
