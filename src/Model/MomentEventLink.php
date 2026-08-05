<?php

/*
 * infrawrench/sdk v0.34.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.34.0).
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

/** The API may send `null` in place of this object. */
final class MomentEventLink implements \JsonSerializable
{
    /**
     * @param string $kind Which native screen the event deep-links to.
     * @param string|null $id Target id where the kind needs one (resource id, run id, freeze id…).
     * @param string|null $parentId Parent id where the target needs one (workflow id for a run).
     * @param string|null $url Absolute external URL — a provider's incident page. Wins when present.
     */
    public function __construct(
        public readonly string $kind,
        public readonly ?string $id = null,
        public readonly ?string $parentId = null,
        public readonly ?string $url = null,
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
            kind: Coerce::toString($data['kind'] ?? null),
            id: Coerce::toStringOrNull($data['id'] ?? null),
            parentId: Coerce::toStringOrNull($data['parentId'] ?? null),
            url: Coerce::toStringOrNull($data['url'] ?? null),
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
            'kind' => $this->kind,
        ];
        if ($this->id !== null) {
            $payload['id'] = $this->id;
        }
        if ($this->parentId !== null) {
            $payload['parentId'] = $this->parentId;
        }
        if ($this->url !== null) {
            $payload['url'] = $this->url;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
