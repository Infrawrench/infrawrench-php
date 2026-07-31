<?php

/*
 * infrawrench/sdk v0.22.0 | MIT | Copyright (c) 2026 Infrawrench LLC
 * https://github.com/Infrawrench/Infrawrench
 *
 * Generated from the Infrawrench API OpenAPI 3.1 spec (API version 0.22.0).
 *
 * DO NOT EDIT. Regenerate with:
 *   pnpm --filter @infrawrench/web generate:sdk
 *
 * Internal routes are absent by construction: the generator consumes the same
 * published spec that /openapi.json serves, which drops every operation
 * marked x-internal.
 */

declare(strict_types=1);

namespace Infrawrench\Sdk;

/**
 * File bytes bound for a `multipart/form-data` field.
 *
 * PHP has no distinct byte-string type, so a plain `string` is accepted
 * everywhere one of these is — this exists only to carry the filename and
 * content type, which the server uses and a bare string cannot express.
 */
final class FileUpload
{
    public function __construct(
        /** Raw bytes. Not a path — see {@see self::fromPath()} for that. */
        public readonly string $contents,
        public readonly string $filename = 'upload',
        public readonly string $contentType = 'application/octet-stream',
    ) {
    }

    /**
     * Read a local file, defaulting the sent filename to its basename.
     *
     * @throws TransportException if the file cannot be read.
     */
    public static function fromPath(
        string $path,
        ?string $filename = null,
        string $contentType = 'application/octet-stream',
    ): self {
        $contents = @file_get_contents($path);
        if ($contents === false) {
            throw new TransportException("Could not read file for upload: {$path}");
        }

        return new self($contents, $filename ?? basename($path), $contentType);
    }
}
