<?php

/**
 * Card service to distribute card
 * @author Md.Rajib-Ul-Islam<mdrajibul@gmail.com>
 */
class CardService implements ICardService
{
    private $cards = array(
        'S-A', 'S-2', 'S-3', 'S-4', 'S-5', 'S-6', 'S-7', 'S-8', 'S-9', 'S-X', 'S-J', 'S-Q', 'S-K',
        'H-A', 'H-2', 'H-3', 'H-4', 'H-5', 'H-6', 'H-7', 'H-8', 'H-9', 'H-X', 'H-J', 'H-Q', 'H-K',
        'D-A', 'D-2', 'D-3', 'D-4', 'D-5', 'D-6', 'D-7', 'D-8', 'D-9', 'D-X', 'D-J', 'D-Q', 'D-K',
        'C-A', 'C-2', 'C-3', 'C-4', 'C-5', 'C-6', 'C-7', 'C-8', 'C-9', 'C-X', 'C-J', 'C-Q', 'C-K'
    );

    /**
     * distribute cards to players
     * @param int $noOfPlayers
     * @return array
     */
    public function distribute(int $noOfPlayers)
    {
        if ($noOfPlayers > 52) {
            $noOfPlayers = 52;
        }
        shuffle($this->cards);
        $distributedCards = array();

        $cardPerPlayer = ceil(sizeof($this->cards) / $noOfPlayers);
        $chunk = array_chunk($this->cards, $noOfPlayers);

        for ($i = 0; $i < $noOfPlayers; $i++) {
            for ($j = 0; $j < $cardPerPlayer; $j++) {
                if (isset($chunk[$j][$i]) && $chunk[$j][$i]) {
                    array_push($distributedCards, $chunk[$j][$i]);
                }
            }
        }
        return array_chunk($distributedCards, $cardPerPlayer);
    }
}
