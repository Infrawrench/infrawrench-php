<?php

/*
 * infrawrench/sdk v1.82.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 1.82.0).
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

/**
 * What the money bought. `network` is load balancers; `compute` is CPU and memory together, and
 * only appears on rows collected before the two were written apart.
 *
 * The values `KubernetesCostCategory` accepts.
 *
 * Constants rather than an enum, deliberately: a value added by a newer API version has to
 * deserialize, and `enum::from()` would raise instead.
 */
final class KubernetesCostCategory
{
    public const CPU = 'cpu';
    public const MEMORY = 'memory';
    public const GPU = 'gpu';
    public const STORAGE = 'storage';
    public const NETWORK = 'network';
    public const CONTROL_PLANE = 'control_plane';
    public const COMPUTE = 'compute';

    /**
     * Every value, in the order the spec lists them.
     *
     * @return list<string>
     */
    public static function values(): array
    {
        return [
            self::CPU,
            self::MEMORY,
            self::GPU,
            self::STORAGE,
            self::NETWORK,
            self::CONTROL_PLANE,
            self::COMPUTE,
        ];
    }
}
