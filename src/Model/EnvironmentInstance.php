<?php

/*
 * infrawrench/sdk v1.21.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.21.0).
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

final class EnvironmentInstance implements \JsonSerializable
{
    /**
     * @param array<string, string> $parameters
     * @param 'creating'|'active'|'partial'|'tearing-down'|'deleted'|'failed' $status `partial` means a create failed part-way: the members that were created are recorded and can still be torn down, which is what stops a half-finished run leaving cloud resources with no row pointing at them.
     * @param list<EnvironmentInstanceMember> $members
     */
    public function __construct(
        public readonly string $id,
        public readonly ?string $templateId,
        public readonly string $templateName,
        public readonly string $name,
        public readonly string $namePrefix,
        public readonly array $parameters,
        public readonly string $status,
        public readonly string $expiresAt,
        public readonly ?string $error,
        public readonly array $members,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly ?string $completedAt,
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
            id: Coerce::toString($data['id'] ?? null),
            templateId: Coerce::toStringOrNull($data['templateId'] ?? null),
            templateName: Coerce::toString($data['templateName'] ?? null),
            name: Coerce::toString($data['name'] ?? null),
            namePrefix: Coerce::toString($data['namePrefix'] ?? null),
            parameters: Coerce::mapValues($data['parameters'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            status: Coerce::toString($data['status'] ?? null),
            expiresAt: Coerce::toString($data['expiresAt'] ?? null),
            error: Coerce::toStringOrNull($data['error'] ?? null),
            members: Coerce::mapList($data['members'] ?? null, static fn (mixed $item): EnvironmentInstanceMember => EnvironmentInstanceMember::fromArray(Coerce::toArray($item))),
            createdAt: Coerce::toString($data['createdAt'] ?? null),
            updatedAt: Coerce::toString($data['updatedAt'] ?? null),
            completedAt: Coerce::toStringOrNull($data['completedAt'] ?? null),
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
            'id' => $this->id,
            'templateId' => $this->templateId,
            'templateName' => $this->templateName,
            'name' => $this->name,
            'namePrefix' => $this->namePrefix,
            'parameters' => $this->parameters,
            'status' => $this->status,
            'expiresAt' => $this->expiresAt,
            'error' => $this->error,
            'members' => array_map(static fn (EnvironmentInstanceMember $item): array => $item->toArray(), $this->members),
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'completedAt' => $this->completedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
