<?php

/*
 * infrawrench/sdk v0.19.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.19.0).
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

final class LogsResponse implements \JsonSerializable
{
    /**
     * @param string $text Raw log text; each entry keeps its trailing newline.
     * @param list<string> $containers Container names available for this resource — drives the container picker.
     * @param string $activeContainer Container `text` was read from.
     */
    public function __construct(
        public readonly string $text,
        public readonly array $containers,
        public readonly string $activeContainer,
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
            text: Coerce::toString($data['text'] ?? null),
            containers: Coerce::mapList($data['containers'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            activeContainer: Coerce::toString($data['activeContainer'] ?? null),
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
            'text' => $this->text,
            'containers' => $this->containers,
            'activeContainer' => $this->activeContainer,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
