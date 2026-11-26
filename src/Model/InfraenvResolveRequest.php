<?php

/*
 * infrawrench/sdk v1.132.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.132.0).
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

final class InfraenvResolveRequest implements \JsonSerializable
{
    /**
     * @param string $source The `.infraenv` file's text.
     * @param array<string, string>|null $vars Substitutions laid over the file's `[vars]` and `[vars.<environment>]`, like the CLI's `--var`.
     * @param string|null $sourceName The file's path, named in the generated `.env` header. Defaults to `.infraenv`.
     */
    public function __construct(
        public readonly string $source,
        public readonly ?string $environment = null,
        public readonly ?array $vars = null,
        public readonly ?string $sourceName = null,
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
            source: Coerce::toString($data['source'] ?? null),
            environment: Coerce::toStringOrNull($data['environment'] ?? null),
            vars: Coerce::nullable($data['vars'] ?? null, static fn (mixed $value): array => Coerce::mapValues($value, static fn (mixed $item): string => Coerce::toString($item))),
            sourceName: Coerce::toStringOrNull($data['sourceName'] ?? null),
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
            'source' => $this->source,
        ];
        if ($this->environment !== null) {
            $payload['environment'] = $this->environment;
        }
        if ($this->vars !== null) {
            $payload['vars'] = $this->vars;
        }
        if ($this->sourceName !== null) {
            $payload['sourceName'] = $this->sourceName;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
