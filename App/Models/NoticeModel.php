<?php declare(strict_types=1);


namespace App\Models;
use DateTimeImmutable;
class NoticeModel
{

    public function __construct(
      
        private ?int $id =null,
        private string $title = '',
        private string $subtitle = '',
        private string $body = '',
        public ?DateTimeImmutable $createdAt = null,
        private string $location = '',
        private bool $status = false,
        private string $img_file = '',
        private int $isActive = 0,
        private ?DateTimeImmutable $updatedAt = null,
        private  int $user_id = 0

        ) {}

    public function get():array
    {
        $aData = [];

        foreach($this as $key => $value)

        {
            if($value instanceof DateTimeImmutable)
            {
              $aData[$key] = (string) $value->format("Y-m-d");
            }else{
                $aData[$key] = $value;
            }
        
        }
        return $aData;
    }

    public function getId(): int|null
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSubtitle(): string
    {
        return $this->subtitle;
    }
    public function getBody(): string
    {
        return $this->body;
    }

    public function getCreatedAt(): DateTimeImmutable|null
    {
        return $this->createdAt;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }
    public function getImg(): string
    {
        return $this->img_file;
    }
    public function getActive(): int
    {
        return $this->isActive;
    }
    public function getUpdatedAt(): DateTimeImmutable|null
    {
        return $this->updatedAt;
    }
}


