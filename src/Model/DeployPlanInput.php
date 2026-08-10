<?php

/*
 * infrawrench/sdk v1.3.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.3.0).
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

final class DeployPlanInput implements \JsonSerializable
{
    /** @param array<string, string>|null $answers */
    public function __construct(
        public readonly string $repo,
        public readonly ?string $branch = null,
        public readonly ?string $env = null,
        public readonly ?array $answers = null,
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
            repo: Coerce::toString($data['repo'] ?? null),
            branch: Coerce::toStringOrNull($data['branch'] ?? null),
            env: Coerce::toStringOrNull($data['env'] ?? null),
            answers: Coerce::nullable($data['answers'] ?? null, static fn (mixed $value): array => Coerce::mapValues($value, static fn (mixed $item): string => Coerce::toString($item))),
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
            'repo' => $this->repo,
        ];
        if ($this->branch !== null) {
            $payload['branch'] = $this->branch;
        }
        if ($this->env !== null) {
            $payload['env'] = $this->env;
        }
        if ($this->answers !== null) {
            $payload['answers'] = $this->answers;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
