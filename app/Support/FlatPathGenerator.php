<?php
// app/Support/FlatPathGenerator.php

namespace App\Support;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class FlatPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        if ($media->getCustomProperty('legacy_path')) {
            return $media->id . '/';
        }

        return '';
    }

    public function getPathForConversions(Media $media): string
    {
        if ($media->getCustomProperty('legacy_path')) {
            return $media->id . '/conversions/';
        }

        return 'conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        if ($media->getCustomProperty('legacy_path')) {
            return $media->id . '/responsive/';
        }

        return 'responsive/';
    }
}
