<?php

namespace Chop;

interface FinderInterface
{
    public function find($needle, $haystack): int;
}
