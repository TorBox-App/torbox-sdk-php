<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateTorrentRequest
{
    /**
     * Tells TorBox if you want to allow this torrent to be zipped or not. TorBox only zips if the torrent is 100 files or larger.
     */
    #[SerializedName('allow_zip')]
    public ?string $allowZip;

    /**
     * Tells TorBox you want this torrent instantly queued. This is bypassed if user is on free plan, and will process the request as normal in this case. Optional.
     */
    #[SerializedName('as_queued')]
    public ?string $asQueued;

    /**
     * @var resource|false*/
    #[SerializedName('file')]
    public mixed $file;

    /**
     * The torrent's magnet link. Optional.
     */
    #[SerializedName('magnet')]
    public ?string $magnet;

    /**
     * The name you want the torrent to be. Optional.
     */
    #[SerializedName('name')]
    public ?string $name;

    /**
     * Tells TorBox your preference for seeding this torrent. 1 is auto. 2 is seed. 3 is don't seed. Optional. Default is 1, or whatever the user has in their settings. Overwrites option in settings.
     */
    #[SerializedName('seed')]
    public ?string $seed;

    public function __construct(
        ?string $allowZip = null,
        ?string $asQueued = null,
        mixed $file,
        ?string $magnet = null,
        ?string $name = null,
        ?string $seed = null
    ) {
        $this->allowZip = $allowZip;
        $this->asQueued = $asQueued;
        $this->file = $file;
        $this->magnet = $magnet;
        $this->name = $name;
        $this->seed = $seed;
    }

    public function toMultipart(): array
    {
        return [
            [
                'name' => 'allowZip',
                'contents' => $this->allowZip,
            ],

            [
                'name' => 'asQueued',
                'contents' => $this->asQueued,
            ],

            [
                'name' => 'file',
                'contents' => $this->file,
                'filename' => 'file.pdf',
            ],

            [
                'name' => 'magnet',
                'contents' => $this->magnet,
            ],

            [
                'name' => 'name',
                'contents' => $this->name,
            ],

            [
                'name' => 'seed',
                'contents' => $this->seed,
            ],
        ];
    }
}
