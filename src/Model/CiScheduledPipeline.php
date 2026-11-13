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

final class CiScheduledPipeline implements \JsonSerializable
{
    /**
     * @param string $file The pipeline file, under `.infrawrench/ci/`.
     * @param list<string> $cron Its `on.schedule` cron expressions, in UTC.
     * @param string|null $nextRunAt The next minute one of them fires on; null when none ever does.
     */
    public function __construct(
        public readonly string $file,
        public readonly string $name,
        public readonly array $cron,
        public readonly ?string $nextRunAt,
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
            file: Coerce::toString($data['file'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            cron: Coerce::mapList($data['cron'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            nextRunAt: Coerce::toStringOrNull($data['nextRunAt'] ?? null),
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
            'file' => $this->file,
            'name' => $this->name,
            'cron' => $this->cron,
            'nextRunAt' => $this->nextRunAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
