<?php

/*
 * infrawrench/sdk v1.133.0 | MIT | Copyright (c) 2026 Infrawrench Services, Inc.
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.133.0).
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

final class CiRepoManual implements \JsonSerializable
{
    /**
     * @param string|null $sha The default branch's commit the pipelines were read from.
     * @param list<CiManualPipeline> $pipelines
     */
    public function __construct(
        public readonly int $installationId,
        public readonly string $repoFullName,
        public readonly string $defaultBranch,
        public readonly ?string $sha,
        public readonly array $pipelines,
        public readonly ?string $refreshedAt,
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
            installationId: Coerce::toInt($data['installationId'] ?? null),
            repoFullName: Coerce::toString($data['repoFullName'] ?? null),
            defaultBranch: Coerce::toString($data['defaultBranch'] ?? null),
            sha: Coerce::toStringOrNull($data['sha'] ?? null),
            pipelines: Coerce::mapList($data['pipelines'] ?? null, static fn (mixed $item): CiManualPipeline => CiManualPipeline::fromArray(Coerce::toArray($item))),
            refreshedAt: Coerce::toStringOrNull($data['refreshedAt'] ?? null),
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
            'installationId' => $this->installationId,
            'repoFullName' => $this->repoFullName,
            'defaultBranch' => $this->defaultBranch,
            'sha' => $this->sha,
            'pipelines' => array_map(static fn (CiManualPipeline $item): array => $item->toArray(), $this->pipelines),
            'refreshedAt' => $this->refreshedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
