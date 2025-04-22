<?php

declare(strict_types=1);

namespace T3example\SetupPackage\Event\Listener;

use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Core\Resource\Event\BeforeFileProcessingEvent;
use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Resource\FileInterface;
use TYPO3\CMS\Core\Resource\FileReference;
use TYPO3\CMS\Core\Resource\ProcessedFile;

/**
 * Forces WebP output for supported image types during file processing,
 * unless a specific output format is already configured.
 *
 * Note: For best performance, the fileExtension should be set explicitly
 * wherever image processing is triggered. This listener ensures fallback
 * behavior and may cause additional processing on first use or cache rebuild.
 */
#[AsEventListener(
    identifier: 'sitepackage/before-file-processing',
)]
final readonly class BeforeFileProcessingEventListener
{
    /**
     * MIME types suitable for WebP conversion.
     *
     * @var array<string>
     */
    private const array SUPPORTED_MIME_TYPES = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/bmp',
        'image/tiff',
    ];

    /**
     * Applies WebP conversion if no fileExtension is configured.
     */
    public function __invoke(BeforeFileProcessingEvent $event): void
    {
        $fileInterface = $event->getFile();

        if (!$this->isWebpConvertible($fileInterface)) {
            return;
        }

        $processedFile = $event->getProcessedFile();
        $configuration = $processedFile->getProcessingConfiguration();

        if (!empty($configuration['fileExtension'])) {
            return;
        }

        $file = $this->resolveFile($fileInterface);
        $configuration['fileExtension'] = 'webp';

        $newProcessedFile = new ProcessedFile(
            $file,
            $event->getTaskType(),
            $configuration
        );
        $event->setProcessedFile($newProcessedFile);
    }

    /**
     * Checks if file MIME type allows WebP conversion.
     */
    private function isWebpConvertible(FileInterface $file): bool
    {
        return in_array($file->getMimeType(), self::SUPPORTED_MIME_TYPES, true);
    }

    /**
     * Returns the original file from a reference or the file itself.
     * Ensures return type is always File.
     */
    private function resolveFile(FileInterface $file): File
    {
        if ($file instanceof FileReference) {
            return $file->getOriginalFile();
        }

        assert($file instanceof File);
        return $file;
    }
}