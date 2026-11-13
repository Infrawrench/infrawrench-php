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

final class CiCloudJob implements \JsonSerializable
{
    /**
     * @param 'claiming'|'starting'|'running'|'tearing_down'|'done' $state `claiming`: Infrawrench is claiming it from the runner (retried when the runner pool is busy). `starting`: the machine is coming up. `running`: it called back. `tearing_down`: the job ended and its compute is being removed. `done`: removed.
     */
    public function __construct(
        public readonly string $jobId,
        public readonly string $jobName,
        public readonly string $pipeline,
        public readonly ?string $accountId,
        public readonly ?string $accountName,
        public readonly string $pluginId,
        public readonly string $kind,
        public readonly ?string $machine,
        public readonly ?string $region,
        public readonly string $state,
        public readonly ?string $outcome,
        public readonly ?string $reason,
        public readonly ?string $label,
        public readonly string $claimedAt,
        public readonly ?string $finishedAt,
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
            jobId: Coerce::toString($data['jobId'] ?? null),
            jobName: Coerce::toString($data['jobName'] ?? null),
            pipeline: Coerce::toString($data['pipeline'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            kind: Coerce::toString($data['kind'] ?? null),
            machine: Coerce::toStringOrNull($data['machine'] ?? null),
            region: Coerce::toStringOrNull($data['region'] ?? null),
            state: Coerce::toString($data['state'] ?? null),
            outcome: Coerce::toStringOrNull($data['outcome'] ?? null),
            reason: Coerce::toStringOrNull($data['reason'] ?? null),
            label: Coerce::toStringOrNull($data['label'] ?? null),
            claimedAt: Coerce::toString($data['claimedAt'] ?? null),
            finishedAt: Coerce::toStringOrNull($data['finishedAt'] ?? null),
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
            'jobId' => $this->jobId,
            'jobName' => $this->jobName,
            'pipeline' => $this->pipeline,
            'accountId' => $this->accountId,
            'accountName' => $this->accountName,
            'pluginId' => $this->pluginId,
            'kind' => $this->kind,
            'machine' => $this->machine,
            'region' => $this->region,
            'state' => $this->state,
            'outcome' => $this->outcome,
            'reason' => $this->reason,
            'label' => $this->label,
            'claimedAt' => $this->claimedAt,
            'finishedAt' => $this->finishedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
