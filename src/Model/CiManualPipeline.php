<?php

/*
 * infrawrench/sdk v1.131.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.131.0).
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

final class CiManualPipeline implements \JsonSerializable
{
    /**
     * @param string $file The pipeline file, under `.infrawrench/ci/`.
     * @param list<CiInput> $inputs
     */
    public function __construct(
        public readonly string $file,
        public readonly string $name,
        public readonly array $inputs,
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
            inputs: Coerce::mapList($data['inputs'] ?? null, static fn (mixed $item): CiInput => CiInput::fromArray(Coerce::toArray($item))),
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
            'inputs' => array_map(static fn (CiInput $item): array => $item->toArray(), $this->inputs),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
