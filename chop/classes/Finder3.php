<?php

namespace Chop;

class Finder3 implements FinderInterface
{
    public function find($needle, $haystack): int
    {
        $array = [];

        for ($i = 0; $i < count($haystack); $i++) {
            $array[] = [
                'index' => $i,
                'value' => $haystack[$i]
            ];
        }

        return $this->_find($needle, $array);
    }

    public function _find($needle, $haystack)
    {
        $size = count($haystack);

        if ($size == 0) {
            return -1;
        }

        $middle = floor($size / 2);
        $candidate = $haystack[$middle];

        if ($candidate['value'] == $needle) {
            return $candidate['index'];
        }

        if ($candidate['value'] < $needle) {
            return $this->_find($needle, array_slice($haystack, $middle + 1, $middle));
        }

        if ($candidate['value'] > $needle) {
            return $this->_find($needle, array_slice($haystack, 0, $middle));
        }
    }

    /**
     * Rekursiver Ansatz, aber mit befestigten Indizes.
     *
     * Sehr viel schneller, keine Fehler mit Indizes.
     * Aber find und _find ist eher schlechte Namenswahl.
     */
}
