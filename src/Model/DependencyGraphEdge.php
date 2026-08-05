<?php

/*
 * infrawrench/sdk v0.33.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.33.0).
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

final class DependencyGraphEdge implements \JsonSerializable
{
    /**
     * @param string $consumerFieldKey The consumer field the reference fills. "parent" for containment edges, where the link is the resource hierarchy itself rather than a field.
     * @param string $providerOutputKey The provider output or identity the reference reads — an output key for output references, the matched identity ("externalId", "name", "endpoint"…) for inferred edges.
     * @param 'output-ref'|'declared'|'containment'|'field-match'|null $kind Where the edge came from: `output-ref` is wired by hand, `declared` from the plugin's own `dependsOn` rule for the resource type, `containment` from the synced parent/child link, `field-match` from a field value that exactly matches another resource's identity. Absent means `output-ref`.
     * @param string|null $label How the plugin words the relationship ("in VPC", "guarded by"), when it declared one.
     */
    public function __construct(
        public readonly string $consumerResourceId,
        public readonly string $consumerFieldKey,
        public readonly string $providerResourceId,
        public readonly string $providerOutputKey,
        public readonly ?string $kind = null,
        public readonly ?string $label = null,
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
            consumerResourceId: Coerce::toString($data['consumerResourceId'] ?? null),
            consumerFieldKey: Coerce::toString($data['consumerFieldKey'] ?? null),
            providerResourceId: Coerce::toString($data['providerResourceId'] ?? null),
            providerOutputKey: Coerce::toString($data['providerOutputKey'] ?? null),
            kind: Coerce::toStringOrNull($data['kind'] ?? null),
            label: Coerce::toStringOrNull($data['label'] ?? null),
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
            'consumerResourceId' => $this->consumerResourceId,
            'consumerFieldKey' => $this->consumerFieldKey,
            'providerResourceId' => $this->providerResourceId,
            'providerOutputKey' => $this->providerOutputKey,
        ];
        if ($this->kind !== null) {
            $payload['kind'] = $this->kind;
        }
        if ($this->label !== null) {
            $payload['label'] = $this->label;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
