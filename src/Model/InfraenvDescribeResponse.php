<?php

/*
 * infrawrench/sdk v1.126.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.126.0).
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

final class InfraenvDescribeResponse implements \JsonSerializable
{
    /**
     * @param list<InfraenvProblem> $problems Syntax problems, then references that point at nothing.
     * @param list<string> $environments
     * @param list<InfraenvResourceDescription> $resources
     * @param list<InfraenvSecretDescription> $secrets
     */
    public function __construct(
        public readonly array $problems,
        public readonly array $environments,
        public readonly array $resources,
        public readonly array $secrets,
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
            problems: Coerce::mapList($data['problems'] ?? null, static fn (mixed $item): InfraenvProblem => InfraenvProblem::fromArray(Coerce::toArray($item))),
            environments: Coerce::mapList($data['environments'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            resources: Coerce::mapList($data['resources'] ?? null, static fn (mixed $item): InfraenvResourceDescription => InfraenvResourceDescription::fromArray(Coerce::toArray($item))),
            secrets: Coerce::mapList($data['secrets'] ?? null, static fn (mixed $item): InfraenvSecretDescription => InfraenvSecretDescription::fromArray(Coerce::toArray($item))),
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
            'problems' => array_map(static fn (InfraenvProblem $item): array => $item->toArray(), $this->problems),
            'environments' => $this->environments,
            'resources' => array_map(static fn (InfraenvResourceDescription $item): array => $item->toArray(), $this->resources),
            'secrets' => array_map(static fn (InfraenvSecretDescription $item): array => $item->toArray(), $this->secrets),
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
