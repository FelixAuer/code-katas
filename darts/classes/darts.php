<?php

namespace Darts;

class Darts
{
    protected $players;
    protected $currentPlayerIndex;

    public function __construct($players, $score)
    {
        $this->players = [];
        foreach ($players as $player) {
            $this->players[] = [
                'name' => $player,
                'score' => $score
            ];
        }

        $this->currentPlayerIndex = 0;
    }

    public function score()
    {
        $scoreParts = [];
        foreach ($this->players as $player) {
            if ($player['score'] == 0) {
                return "{$player['name']} gewinnt!";
            }

            $scoreParts[] = "{$player['name']}: {$player['score']}";
        }

        return implode(' - ', $scoreParts);
    }

    public function hit($points)
    {
        if ($points < 0 || $points > 180) {
            return;
        }

        $newScore = $this->players[$this->currentPlayerIndex]['score'] - $points;

        if ($newScore >= 0) {
            $this->players[$this->currentPlayerIndex]['score'] = $newScore;
        }

        $this->currentPlayerIndex = ($this->currentPlayerIndex + 1) % count($this->players);
    }

    public function currentPlayer()
    {
        return $this->players[$this->currentPlayerIndex]['name'];
    }
}
