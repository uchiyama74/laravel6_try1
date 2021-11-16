<?php

namespace App\Services;

class MySrv1Service
{
    public function getDate(int $later = null): string
    {
        if ($later === null) {
            $later = time();
        }

        return date('Y年m月d日', $later);
    }

    public function getArray(): array
    {
        $result = [
            'key1' => '値1',
            'key2' => '値2',
            'key3' => '値3',
            'key4' => '値4',
            'key5' => '値5',
        ];

        return $result;
    }
}
