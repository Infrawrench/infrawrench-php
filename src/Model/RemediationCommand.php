<?php

/*
 * infrawrench/sdk v1.73.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.73.0).
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

final class RemediationCommand implements \JsonSerializable
{
    /**
     * @param string $tool CLI the command is written for: aws-cli, gcloud, az, doctl, hcloud, scw, linode-cli, oci, kubectl, terraform, confluent, atlas, gh, twilio, snowflake-sql, curl, or a plugin's own.
     * @param string $command The command line, values already shell-quoted.
     * @param string $description What the command does.
     * @param bool $destructive True when it deletes data or releases something that cannot be got back.
     * @param list<RemediationPlaceholder>|null $placeholders
     */
    public function __construct(
        public readonly string $tool,
        public readonly string $command,
        public readonly string $description,
        public readonly bool $destructive,
        public readonly ?array $placeholders = null,
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
            tool: Coerce::toString($data['tool'] ?? null),
            command: Coerce::toString($data['command'] ?? null),
            description: Coerce::toString($data['description'] ?? null),
            destructive: Coerce::toBool($data['destructive'] ?? null),
            placeholders: Coerce::nullable($data['placeholders'] ?? null, static fn (mixed $value): array => Coerce::mapList($value, static fn (mixed $item): RemediationPlaceholder => RemediationPlaceholder::fromArray(Coerce::toArray($item)))),
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
            'tool' => $this->tool,
            'command' => $this->command,
            'description' => $this->description,
            'destructive' => $this->destructive,
        ];
        if ($this->placeholders !== null) {
            $payload['placeholders'] = array_map(static fn (RemediationPlaceholder $item): array => $item->toArray(), $this->placeholders);
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
