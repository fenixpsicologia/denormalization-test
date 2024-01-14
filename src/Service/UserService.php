<?php

namespace App\Service;

use App\DTO\User;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

readonly class UserService
{
    public function __construct(
        private DenormalizerInterface $denormalizer,
        private NormalizerInterface   $normalizer
    ) {
    }

    public function normalize(array $data): array
    {
        $user = $this->denormalizer->denormalize($data, User::class);

        return $this->normalizer->normalize($user);
    }
}