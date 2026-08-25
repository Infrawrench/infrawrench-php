<?php

/*
 * infrawrench/sdk v1.39.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.39.0).
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

final class EnvironmentTemplateInput implements \JsonSerializable
{
    /**
     * @param list<EnvironmentParameter> $parameters
     * @param list<EnvironmentTemplateMember> $members
     */
    public function __construct(
        public readonly string $name,
        public readonly array $parameters,
        public readonly array $members,
        public readonly ?string $description = null,
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
            name: Coerce::toString($data['name'] ?? null),
            parameters: Coerce::mapList($data['parameters'] ?? null, static fn (mixed $item): EnvironmentParameter => EnvironmentParameter::fromArray(Coerce::toArray($item))),
            members: Coerce::mapList($data['members'] ?? null, static fn (mixed $item): EnvironmentTemplateMember => EnvironmentTemplateMember::fromArray(Coerce::toArray($item))),
            description: Coerce::toStringOrNull($data['description'] ?? null),
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
            'name' => $this->name,
            'parameters' => array_map(static fn (EnvironmentParameter $item): array => $item->toArray(), $this->parameters),
            'members' => array_map(static fn (EnvironmentTemplateMember $item): array => $item->toArray(), $this->members),
        ];
        if ($this->description !== null) {
            $payload['description'] = $this->description;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
