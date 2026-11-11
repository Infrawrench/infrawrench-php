<?php

/*
 * infrawrench/sdk v1.102.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.102.0).
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

final class CiValues implements \JsonSerializable
{
    /**
     * @param list<CiSecret> $secrets Secret names only: a secret's value is write-only.
     * @param list<CiVariable> $variables
     */
    public function __construct(
        public readonly int $installationId,
        public readonly ?string $repo,
        public readonly array $secrets,
        public readonly array $variables,
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
            installationId: Coerce::toInt($data['installationId'] ?? null),
            repo: Coerce::toStringOrNull($data['repo'] ?? null),
            secrets: Coerce::mapList($data['secrets'] ?? null, static fn (mixed $item): CiSecret => CiSecret::fromArray(Coerce::toArray($item))),
            variables: Coerce::mapList($data['variables'] ?? null, static fn (mixed $item): CiVariable => CiVariable::fromArray(Coerce::toArray($item))),
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
            'installationId' => $this->installationId,
            'repo' => $this->repo,
            'secrets' => array_map(static fn (CiSecret $item): array => $item->toArray(), $this->secrets),
            'variables' => array_map(static fn (CiVariable $item): array => $item->toArray(), $this->variables),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
