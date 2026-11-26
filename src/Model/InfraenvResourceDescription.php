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

final class InfraenvResourceDescription implements \JsonSerializable
{
    /**
     * @param string $ref client-core `infraenvReferenceKey` of the expanded reference: how an editor matches a row to its description.
     * @param bool $found False when the organization has no such resource (deleted, a typo, or a name that matches several).
     * @param bool $outputKnown False when the resource's type does not declare this output.
     * @param string|null $resourceId The resource named by id, or the one a by-name reference found.
     * @param int|null $matches For a by-name reference, how many resources matched; only 1 resolves.
     */
    public function __construct(
        public readonly string $ref,
        public readonly string $output,
        public readonly bool $found,
        public readonly bool $outputKnown,
        public readonly bool $sensitive,
        public readonly ?string $resourceId = null,
        public readonly ?InfraenvResourceMatch $match = null,
        public readonly ?int $matches = null,
        public readonly ?string $displayName = null,
        public readonly ?string $pluginId = null,
        public readonly ?string $pluginName = null,
        public readonly ?string $resourceTypeId = null,
        public readonly ?string $resourceTypeName = null,
        public readonly ?string $accountId = null,
        public readonly ?string $accountName = null,
        public readonly ?string $outputLabel = null,
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
            ref: Coerce::toString($data['ref'] ?? null),
            output: Coerce::toString($data['output'] ?? null),
            found: Coerce::toBool($data['found'] ?? null),
            outputKnown: Coerce::toBool($data['outputKnown'] ?? null),
            sensitive: Coerce::toBool($data['sensitive'] ?? null),
            resourceId: Coerce::toStringOrNull($data['resourceId'] ?? null),
            match: Coerce::nullable($data['match'] ?? null, static fn (mixed $value): InfraenvResourceMatch => InfraenvResourceMatch::fromArray(Coerce::toArray($value))),
            matches: Coerce::toIntOrNull($data['matches'] ?? null),
            displayName: Coerce::toStringOrNull($data['displayName'] ?? null),
            pluginId: Coerce::toStringOrNull($data['pluginId'] ?? null),
            pluginName: Coerce::toStringOrNull($data['pluginName'] ?? null),
            resourceTypeId: Coerce::toStringOrNull($data['resourceTypeId'] ?? null),
            resourceTypeName: Coerce::toStringOrNull($data['resourceTypeName'] ?? null),
            accountId: Coerce::toStringOrNull($data['accountId'] ?? null),
            accountName: Coerce::toStringOrNull($data['accountName'] ?? null),
            outputLabel: Coerce::toStringOrNull($data['outputLabel'] ?? null),
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
            'ref' => $this->ref,
            'output' => $this->output,
            'found' => $this->found,
            'outputKnown' => $this->outputKnown,
            'sensitive' => $this->sensitive,
        ];
        if ($this->resourceId !== null) {
            $payload['resourceId'] = $this->resourceId;
        }
        if ($this->match !== null) {
            $payload['match'] = $this->match->toArray();
        }
        if ($this->matches !== null) {
            $payload['matches'] = $this->matches;
        }
        if ($this->displayName !== null) {
            $payload['displayName'] = $this->displayName;
        }
        if ($this->pluginId !== null) {
            $payload['pluginId'] = $this->pluginId;
        }
        if ($this->pluginName !== null) {
            $payload['pluginName'] = $this->pluginName;
        }
        if ($this->resourceTypeId !== null) {
            $payload['resourceTypeId'] = $this->resourceTypeId;
        }
        if ($this->resourceTypeName !== null) {
            $payload['resourceTypeName'] = $this->resourceTypeName;
        }
        if ($this->accountId !== null) {
            $payload['accountId'] = $this->accountId;
        }
        if ($this->accountName !== null) {
            $payload['accountName'] = $this->accountName;
        }
        if ($this->outputLabel !== null) {
            $payload['outputLabel'] = $this->outputLabel;
        }

        return $payload;
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
