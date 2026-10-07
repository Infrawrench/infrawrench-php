<?php

/*
 * infrawrench/sdk v1.76.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.76.0).
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

/**
 * Idle commitments only: the provider's commands for inspecting and acting on the commitment. Null
 * for the other kinds.
 *
 * The API may send `null` in place of this object.
 */
final class FindingRemediation implements \JsonSerializable
{
    /**
     * @param list<RemediationCommand> $commands In run order; empty when the plugin has nothing to offer for this finding.
     * @param list<RemediationPlaceholder> $placeholders Every shell variable the commands reference, deduplicated.
     * @param array{address: string, stateLabel: string|null, attributeChanges: list<array{attribute: string, from: string|null, to: string|null}>, commands: list<array<string, mixed>>}|null $iac Set when IaC reconciliation says Terraform manages the resource: edit the named block instead of running the CLI commands, which the next apply would revert.
     */
    public function __construct(
        public readonly array $commands,
        public readonly array $placeholders,
        public readonly ?array $iac,
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
            commands: Coerce::mapList($data['commands'] ?? null, static fn (mixed $item): RemediationCommand => RemediationCommand::fromArray(Coerce::toArray($item))),
            placeholders: Coerce::mapList($data['placeholders'] ?? null, static fn (mixed $item): RemediationPlaceholder => RemediationPlaceholder::fromArray(Coerce::toArray($item))),
            iac: Coerce::toArrayOrNull($data['iac'] ?? null),
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
            'commands' => array_map(static fn (RemediationCommand $item): array => $item->toArray(), $this->commands),
            'placeholders' => array_map(static fn (RemediationPlaceholder $item): array => $item->toArray(), $this->placeholders),
            'iac' => $this->iac,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
