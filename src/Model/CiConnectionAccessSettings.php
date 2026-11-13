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

final class CiConnectionAccessSettings implements \JsonSerializable
{
    /**
     * @param bool $jobsEnabled Cloud jobs may run on this connection. Needs a passing check for every kind.
     * @param list<'vm'|'container'|'build'|'host'|'cluster'> $jobKinds
     * @param list<string>|null $jobRepos Repositories (`owner/name`). Null: every repository the organization runs CI for.
     * @param string|null $jobBranchPattern Branches it holds for: globs separated by commas, where `*` stops at `/` and `**` does not (`main, release/*`). Null: every branch.
     * @param bool $lendEnabled Jobs may be lent this connection's credentials (`connections:`).
     * @param list<string>|null $lendRepos Repositories (`owner/name`). Null: every repository the organization runs CI for.
     * @param string|null $lendBranchPattern Branches it holds for: globs separated by commas, where `*` stops at `/` and `**` does not (`main, release/*`). Null: every branch.
     */
    public function __construct(
        public readonly bool $jobsEnabled,
        public readonly array $jobKinds,
        public readonly int $maxConcurrentJobs,
        public readonly int $maxJobMinutes,
        public readonly ?array $jobRepos,
        public readonly ?string $jobBranchPattern,
        public readonly bool $lendEnabled,
        public readonly ?array $lendRepos,
        public readonly ?string $lendBranchPattern,
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
            jobsEnabled: Coerce::toBool($data['jobsEnabled'] ?? null),
            jobKinds: Coerce::mapList($data['jobKinds'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            maxConcurrentJobs: Coerce::toInt($data['maxConcurrentJobs'] ?? null),
            maxJobMinutes: Coerce::toInt($data['maxJobMinutes'] ?? null),
            jobRepos: Coerce::nullable($data['jobRepos'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            jobBranchPattern: Coerce::toStringOrNull($data['jobBranchPattern'] ?? null),
            lendEnabled: Coerce::toBool($data['lendEnabled'] ?? null),
            lendRepos: Coerce::nullable($data['lendRepos'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            lendBranchPattern: Coerce::toStringOrNull($data['lendBranchPattern'] ?? null),
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
            'jobsEnabled' => $this->jobsEnabled,
            'jobKinds' => $this->jobKinds,
            'maxConcurrentJobs' => $this->maxConcurrentJobs,
            'maxJobMinutes' => $this->maxJobMinutes,
            'jobRepos' => $this->jobRepos,
            'jobBranchPattern' => $this->jobBranchPattern,
            'lendEnabled' => $this->lendEnabled,
            'lendRepos' => $this->lendRepos,
            'lendBranchPattern' => $this->lendBranchPattern,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
