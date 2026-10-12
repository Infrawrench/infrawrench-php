<?php

/*
 * infrawrench/sdk v1.81.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.81.0).
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

final class DoraSettings implements \JsonSerializable
{
    /**
     * @param int $failureWindowHours Hours after a change in which an incident or rollback counts against it (1-720).
     * @param list<string> $productionEnvironments Environment name patterns that count as production; `*` matches anything. 1-50.
     * @param list<string> $pipelinePatterns CI pipeline names that count as deploys (Buildkite, CircleCI, GitLab...). 0-50.
     * @param bool $countFailedDeploys Count a production deploy that failed as a failed change.
     * @param bool $includeResourceChanges Count changes observed by sync (the change timeline) as changes too.
     * @param bool $digestEnabled Include the Delivery line in the weekly digest.
     * @param string|null $updatedAt Null until the settings were first saved.
     */
    public function __construct(
        public readonly int $failureWindowHours,
        public readonly array $productionEnvironments,
        public readonly array $pipelinePatterns,
        public readonly bool $countFailedDeploys,
        public readonly bool $includeResourceChanges,
        public readonly bool $digestEnabled,
        public readonly ?string $updatedAt,
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
            failureWindowHours: Coerce::toInt($data['failureWindowHours'] ?? null),
            productionEnvironments: Coerce::mapList($data['productionEnvironments'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            pipelinePatterns: Coerce::mapList($data['pipelinePatterns'] ?? null, static fn (mixed $item): string => Coerce::toString($item)),
            countFailedDeploys: Coerce::toBool($data['countFailedDeploys'] ?? null),
            includeResourceChanges: Coerce::toBool($data['includeResourceChanges'] ?? null),
            digestEnabled: Coerce::toBool($data['digestEnabled'] ?? null),
            updatedAt: Coerce::toStringOrNull($data['updatedAt'] ?? null),
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
            'failureWindowHours' => $this->failureWindowHours,
            'productionEnvironments' => $this->productionEnvironments,
            'pipelinePatterns' => $this->pipelinePatterns,
            'countFailedDeploys' => $this->countFailedDeploys,
            'includeResourceChanges' => $this->includeResourceChanges,
            'digestEnabled' => $this->digestEnabled,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /** @return array<string, mixed> */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
