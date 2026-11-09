<?php

/*
 * infrawrench/sdk v1.101.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.101.0).
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

final class CiJobOutput implements \JsonSerializable
{
    /**
     * @param 'passed'|'failed'|'skipped'|'error' $status
     * @param float|'Infinity'|'-Infinity'|'NaN'|null $durationMs
     * @param list<string>|null $needs The job keys it waited for, as the pipeline's `needs:` expanded them. Absent from runs before runner 0.3.1.
     */
    public function __construct(
        public readonly string $pipeline,
        public readonly string $id,
        public readonly string $name,
        public readonly string $status,
        public readonly ?string $reason,
        public readonly float|string|null $durationMs,
        public readonly string $stdout,
        public readonly string $stderr,
        public readonly ?array $needs = null,
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
            pipeline: Coerce::toString($data['pipeline'] ?? null),
            id: Coerce::toString($data['id'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            status: Coerce::toString($data['status'] ?? null),
            reason: Coerce::toStringOrNull($data['reason'] ?? null),
            durationMs: $data['durationMs'] ?? null,
            stdout: Coerce::toString($data['stdout'] ?? null),
            stderr: Coerce::toString($data['stderr'] ?? null),
            needs: Coerce::nullable($data['needs'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
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
            'pipeline' => $this->pipeline,
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'reason' => $this->reason,
            'durationMs' => $this->durationMs,
            'stdout' => $this->stdout,
            'stderr' => $this->stderr,
        ];
        if ($this->needs !== null) {
            $payload['needs'] = $this->needs;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
