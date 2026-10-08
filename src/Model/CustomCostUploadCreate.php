<?php

/*
 * infrawrench/sdk v1.77.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.77.0).
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

final class CustomCostUploadCreate implements \JsonSerializable
{
    /**
     * @param 'csv'|'focus'|'rows' $format
     * @param string $fromDate Inclusive. Rows outside the range are rejected.
     * @param 'append'|'replace'|null $mode What to do with spend this source already holds in the range. `append` adds to it; `replace` zeroes it (from every earlier upload) when this upload completes. Required when the range overlaps an earlier upload that still holds rows: omitted, that case is a 409 listing the overlapping uploads.
     * @param 'web'|'desktop'|'cli'|'api'|null $via
     */
    public function __construct(
        public readonly string $format,
        public readonly string $fromDate,
        public readonly string $toDate,
        public readonly ?string $fileName = null,
        public readonly ?string $mode = null,
        public readonly ?string $via = null,
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
            format: Coerce::toString($data['format'] ?? null),
            fromDate: Coerce::toString($data['fromDate'] ?? null),
            toDate: Coerce::toString($data['toDate'] ?? null),
            fileName: Coerce::toStringOrNull($data['fileName'] ?? null),
            mode: Coerce::toStringOrNull($data['mode'] ?? null),
            via: Coerce::toStringOrNull($data['via'] ?? null),
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
            'format' => $this->format,
            'fromDate' => $this->fromDate,
            'toDate' => $this->toDate,
        ];
        if ($this->fileName !== null) {
            $payload['fileName'] = $this->fileName;
        }
        if ($this->mode !== null) {
            $payload['mode'] = $this->mode;
        }
        if ($this->via !== null) {
            $payload['via'] = $this->via;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
