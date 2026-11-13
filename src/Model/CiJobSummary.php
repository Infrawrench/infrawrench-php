<?php

/*
 * infrawrench/sdk v1.107.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.107.0).
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

final class CiJobSummary implements \JsonSerializable
{
    /**
     * @param 'passed'|'failed'|'skipped'|'error'|'cancelled' $status
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
        public readonly ?array $needs = null,
        public readonly ?CiJobAccessNames $access = null,
        public readonly ?CiJobCloud $cloud = null,
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
            needs: Coerce::nullable($data['needs'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): string => Coerce::toString($item))),
            access: Coerce::nullable($data['access'] ?? null, static fn (mixed $value): CiJobAccessNames => CiJobAccessNames::fromArray(Coerce::toArray($value))),
            cloud: Coerce::nullable($data['cloud'] ?? null, static fn (mixed $value): CiJobCloud => CiJobCloud::fromArray(Coerce::toArray($value))),
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
        ];
        if ($this->needs !== null) {
            $payload['needs'] = $this->needs;
        }
        if ($this->access !== null) {
            $payload['access'] = $this->access->toArray();
        }
        if ($this->cloud !== null) {
            $payload['cloud'] = $this->cloud->toArray();
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
