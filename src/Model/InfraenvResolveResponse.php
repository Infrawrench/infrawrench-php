<?php

/*
 * infrawrench/sdk v1.134.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.134.0).
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

final class InfraenvResolveResponse implements \JsonSerializable
{
    /**
     * @param list<array{key: string, value: string}> $values
     * @param list<InfraenvProblem> $problems Variables that did not resolve, with why. They are left out of `values` and `dotenv`.
     * @param string $dotenv The resolved `.env` text, starting with its auto-generated header.
     */
    public function __construct(
        public readonly ?string $environment,
        public readonly array $values,
        public readonly array $problems,
        public readonly string $dotenv,
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
            environment: Coerce::toStringOrNull($data['environment'] ?? null),
            values: Coerce::mapList($data['values'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            problems: Coerce::mapList($data['problems'] ?? null, static fn (mixed $item): InfraenvProblem => InfraenvProblem::fromArray(Coerce::toArray($item))),
            dotenv: Coerce::toString($data['dotenv'] ?? null),
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
            'environment' => $this->environment,
            'values' => $this->values,
            'problems' => array_map(static fn (InfraenvProblem $item): array => $item->toArray(), $this->problems),
            'dotenv' => $this->dotenv,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
