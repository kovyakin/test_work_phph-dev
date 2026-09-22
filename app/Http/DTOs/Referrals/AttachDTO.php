<?php

declare(strict_types=1);

namespace App\Http\DTOs\Referrals;
use App\Models\Master;
use Symfony\Component\HttpFoundation\Request;

final class AttachDTO
{

    /**
     * @var string
     */
    public string $code;

    /**
     * @var \App\Models\Master
     */
    public \App\Models\Master $master;

    /**
     * @param  string  $code
     * @param  \App\Models\Master  $master
     * AttachDTO constructor
     */
    public function __construct(string $code, Master $master)
    {
        $this->code = $code;
        $this->master = $master;
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return self
     */
    public static function fromArray(Request $request): self
    {
        return new self(
            code: $request->attributes->get('code'),
            master: $request->attributes->get('current_master'),
        );
    }

    /**
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'master' => $this->master,
        ];
    }

}