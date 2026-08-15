<?php

/*
 * infrawrench/sdk v1.26.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.26.0).
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

final class PolicyTemplate implements \JsonSerializable
{
    /**
     * @param 'json'|'yaml'|'text' $language
     * @param array{label: string, url: string}|null $helpLink
     */
    public function __construct(
        public readonly string $formatLabel,
        public readonly string $language,
        public readonly string $document,
        public readonly ?string $instructions = null,
        public readonly ?array $helpLink = null,
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
            formatLabel: Coerce::toString($data['formatLabel'] ?? null),
            language: Coerce::toString($data['language'] ?? null),
            document: Coerce::toString($data['document'] ?? null),
            instructions: Coerce::toStringOrNull($data['instructions'] ?? null),
            helpLink: Coerce::toArrayOrNull($data['helpLink'] ?? null),
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
            'formatLabel' => $this->formatLabel,
            'language' => $this->language,
            'document' => $this->document,
        ];
        if ($this->instructions !== null) {
            $payload['instructions'] = $this->instructions;
        }
        if ($this->helpLink !== null) {
            $payload['helpLink'] = $this->helpLink;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
