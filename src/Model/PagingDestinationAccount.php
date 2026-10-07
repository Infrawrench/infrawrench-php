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

final class PagingDestinationAccount implements \JsonSerializable
{
    /**
     * @param list<array{id: string, name: string, description: string|null}> $targets
     * @param list<array{id: string, name: string, kind: 'schedule'|'escalation-policy'}> $onCallSources
     * @param string|null $error Why this account's lists could not be loaded; the other accounts still load.
     */
    public function __construct(
        public readonly string $accountId,
        public readonly string $displayName,
        public readonly string $pluginId,
        public readonly string $targetLabel,
        public readonly ?string $onCallSourceLabel,
        public readonly array $targets,
        public readonly array $onCallSources,
        public readonly ?string $error,
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
            accountId: Coerce::toString($data['accountId'] ?? null),
            displayName: Coerce::toString($data['displayName'] ?? null),
            pluginId: Coerce::toString($data['pluginId'] ?? null),
            targetLabel: Coerce::toString($data['targetLabel'] ?? null),
            onCallSourceLabel: Coerce::toStringOrNull($data['onCallSourceLabel'] ?? null),
            targets: Coerce::mapList($data['targets'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            onCallSources: Coerce::mapList($data['onCallSources'] ?? null, static fn (mixed $item): array => Coerce::toArray($item)),
            error: Coerce::toStringOrNull($data['error'] ?? null),
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
            'accountId' => $this->accountId,
            'displayName' => $this->displayName,
            'pluginId' => $this->pluginId,
            'targetLabel' => $this->targetLabel,
            'onCallSourceLabel' => $this->onCallSourceLabel,
            'targets' => $this->targets,
            'onCallSources' => $this->onCallSources,
            'error' => $this->error,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
