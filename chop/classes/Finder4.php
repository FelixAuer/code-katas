<?php

namespace Chop;

class Finder4 implements FinderInterface
{
    public function find($needle, $haystack, $offset = 0): int
    {
        $size = sizeof($haystack);

        if ($size == 0) {
            return -1;
        }

        $middle = floor($size / 2);

        $candidate = $haystack[$middle];

        if ($candidate == $needle) {
            return $middle + $offset;
        }

        if ($candidate < $needle) {
            return $this->find($needle, array_slice($haystack, $middle + 1, $middle), $middle + 1);
        }

        if ($candidate > $needle) {
            return $this->find($needle, array_slice($haystack, 0, $middle), 0);
        }
    }

    /**
     * Rekursiver Ansatz mit Tail-Recursion
     *
     * Sehr leicht.
     *
     * Sehr schöne Lösung finde ich.
     */
}
