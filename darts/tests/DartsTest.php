<?php

use PHPUnit\Framework\TestCase;
use Darts\Darts;

final class DartsTest extends TestCase
{
    private $players = ['Felix', 'Alex', 'Daniel'];

    /** @test */
    public function you_can_set_up_a_2_player_game()
    {
        $game = $this->setupGame(2);

        $this->assertEquals('Felix: 501 - Alex: 501', $game->score());
    }

    /** @test */
    public function you_can_set_up_a_3_player_game()
    {
        $game = $this->setupGame(3);

        $this->assertEquals('Felix: 501 - Alex: 501 - Daniel: 501', $game->score());
    }

    /** @test */
    public function it_returns_the_current_player()
    {
        $game = $this->setupGame(2);

        $this->assertEquals('Felix', $game->currentPlayer());
    }

    /** @test */
    public function scoring_lowers_the_score()
    {
        $game = $this->setupGame(2);

        $game->hit(50);

        $this->assertEquals('Felix: 451 - Alex: 501', $game->score());
    }

    /** @test */
    public function scoring_changes_the_player()
    {
        $game = $this->setupGame(2);
        $game->hit(50);

        $this->assertEquals('Alex', $game->currentPlayer());
    }

    /** @test */
    public function scoring_circles_the_players()
    {
        $game = $this->setupGame(3);
        $game->hit(50);
        $game->hit(50);
        $game->hit(50);

        $this->assertEquals('Felix', $game->currentPlayer());
    }

    /** @test */
    public function overthrowing_cancels_the_hit()
    {
        $game = $this->setupGame(1, 50);
        $game->hit(60);

        $this->assertEquals('Felix: 50', $game->score());
    }

    /** @test */
    public function throwing_negative_points_doesnt_count()
    {
        $game = $this->setupGame(2, 50);
        $game->hit(-60);

        $this->assertEquals('Felix: 50 - Alex: 50', $game->score());
        $this->assertEquals('Felix', $game->currentPlayer());
    }

    /** @test */
    public function throwing_more_than_180_doesnt_count()
    {
        $game = $this->setupGame(2, 50);
        $game->hit(200);

        $this->assertEquals('Felix: 50 - Alex: 50', $game->score());
        $this->assertEquals('Felix', $game->currentPlayer());
    }

    /** @test */
    public function it_shows_a_winner()
    {
        $game = $this->setupGame(2, 50);
        $game->hit(50);

        $this->assertEquals('Felix gewinnt!', $game->score());
    }

    private function setupGame($numberOfPlayers = 2, $score = 501)
    {
        return new Darts(array_slice($this->players, 0, $numberOfPlayers), $score);
    }
}
