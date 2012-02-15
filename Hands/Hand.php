<?php

class Hand {
    /** @var Card[] */
    private $_Cards;

    /**
     * @param Card[] $Cards
     *
     */
    public function __construct(array $Cards)
    {
        $this->_Cards = $Cards;
    }

    /**
     * @return Card[]
     */
    public function getCards()
    {
        return $this->_Cards;
    }

    /**
     * @return Card
     */
    public function getHighCard()
    {
        $HighCard = null;
        foreach ($this->_Cards as $Card) {
            if (is_null($HighCard) || ($Card->compareTo($HighCard) < 0)) {
                $HighCard = $Card;
            }
        }
        return $HighCard;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $handString = '';

        foreach ($this->getCards() as $Card) {
            $handString .= $Card . '  ';
        }

        $handString .= "({$this->getHandType()})";
        return $handString;
    }

    /**
     * @return string
     */
    protected function getHandType()
    {
        $handTypeString = '';
        $myClass = get_class($this);

        for ($i = 0; $i < strlen($myClass); $i++) {
            $character = $myClass{$i};
            if (ctype_upper($character)) {
                $handTypeString .= ' ';
            }
            $handTypeString .= $character;
        }

        return trim($handTypeString);
    }
}
