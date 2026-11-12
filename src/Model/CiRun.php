<?php

/*
 * infrawrench/sdk v1.105.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.105.0).
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

final class CiRun implements \JsonSerializable
{
    /**
     * @param 'push'|'pull-request' $event
     * @param CiRunStatus::* $status
     * @param list<CiJobSummary>|null $jobs
     * @param float|'Infinity'|'-Infinity'|'NaN'|null $vcpuSeconds
     * @param float|'Infinity'|'-Infinity'|'NaN'|null $memoryGibSeconds
     * @param string|null $retryOfRunId The run this one retries: the same repository, commit, branch and event.
     * @param string|null $retriedAsRunId The newest retry of this run.
     * @param bool|null $noTaskCache The run did not read the task cache: every `task-cache:` job ran, and saved its result again.
     * @param list<string>|null $concurrencyGroups The `concurrency:` groups its pipelines hold or wait for, once the runners have read them.
     * @param bool|null $cancelRequested Someone asked to cancel the run, and its runner is stopping it.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $repoFullName,
        public readonly string $event,
        public readonly string $headRef,
        public readonly string $sha,
        public readonly ?int $pullNumber,
        public readonly ?string $headRepoFullName,
        public readonly bool $fromFork,
        public readonly ?string $actorLogin,
        public readonly string $status,
        public readonly ?string $statusReason,
        public readonly string $createdAt,
        public readonly ?string $startedAt,
        public readonly ?string $finishedAt,
        public readonly ?array $jobs,
        public readonly float|string|null $vcpuSeconds,
        public readonly float|string|null $memoryGibSeconds,
        public readonly string $githubUrl,
        public readonly ?string $retryOfRunId = null,
        public readonly ?string $retriedAsRunId = null,
        public readonly ?bool $noTaskCache = null,
        public readonly ?array $concurrencyGroups = null,
        public readonly ?bool $cancelRequested = null,
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
            id: Coerce::toString($data['id'] ?? null),
            repoFullName: Coerce::toString($data['repoFullName'] ?? null),
            event: Coerce::toString($data['event'] ?? null),
            headRef: Coerce::toString($data['headRef'] ?? null),
            sha: Coerce::toString($data['sha'] ?? null),
            pullNumber: Coerce::toIntOrNull($data['pullNumber'] ?? null),
            headRepoFullName: Coerce::toStringOrNull($data['headRepoFullName'] ?? null),
            fromFork: Coerce::toBool($data['fromFork'] ?? null),
            actorLogin: Coerce::toStringOrNull($data['actorLogin'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            statusReason: Coerce::toStringOrNull($data['statusReason'] ?? null),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            startedAt: Coerce::toStringOrNull($data['startedAt'] ?? null),
            finishedAt: Coerce::toStringOrNull($data['finishedAt'] ?? null),
            jobs: Coerce::nullable($data['jobs'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): CiJobSummary => CiJobSummary::fromArray(Coerce::toArray($item)))),
            vcpuSeconds: $data['vcpuSeconds'] ?? null,
            memoryGibSeconds: $data['memoryGibSeconds'] ?? null,
            githubUrl: Coerce::toString($data['githubUrl'] ?? null),
            retryOfRunId: Coerce::toStringOrNull($data['retryOfRunId'] ?? null),
            retriedAsRunId: Coerce::toStringOrNull($data['retriedAsRunId'] ?? null),
            noTaskCache: Coerce::toBoolOrNull($data['noTaskCache'] ?? null),
            concurrencyGroups: Coerce::nullable($data['concurrencyGroups'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            cancelRequested: Coerce::toBoolOrNull($data['cancelRequested'] ?? null),
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
            'id' => $this->id,
            'repoFullName' => $this->repoFullName,
            'event' => $this->event,
            'headRef' => $this->headRef,
            'sha' => $this->sha,
            'pullNumber' => $this->pullNumber,
            'headRepoFullName' => $this->headRepoFullName,
            'fromFork' => $this->fromFork,
            'actorLogin' => $this->actorLogin,
            'status' => $this->status,
            'statusReason' => $this->statusReason,
            'createdAt' => $this->createdAt,
            'startedAt' => $this->startedAt,
            'finishedAt' => $this->finishedAt,
            'jobs' => $this->jobs === null ? null : array_map(static fn (CiJobSummary $item): array => $item->toArray(), $this->jobs),
            'vcpuSeconds' => $this->vcpuSeconds,
            'memoryGibSeconds' => $this->memoryGibSeconds,
            'githubUrl' => $this->githubUrl,
        ];
        if ($this->retryOfRunId !== null) {
            $payload['retryOfRunId'] = $this->retryOfRunId;
        }
        if ($this->retriedAsRunId !== null) {
            $payload['retriedAsRunId'] = $this->retriedAsRunId;
        }
        if ($this->noTaskCache !== null) {
            $payload['noTaskCache'] = $this->noTaskCache;
        }
        if ($this->concurrencyGroups !== null) {
            $payload['concurrencyGroups'] = $this->concurrencyGroups;
        }
        if ($this->cancelRequested !== null) {
            $payload['cancelRequested'] = $this->cancelRequested;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
