<?php

class Element
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class Opponents
{
    private array $elements;

    public function __construct(array $elements)
    {
        $this->elements = $elements;
    }

    public function randElement(): Element
    {
        return $this->elements[array_rand($this->elements)];
    }
}

class Game
{
    private array $elementsWin;
    private string $opponent;
    private string $user;

    public function __construct(array $elementsWin, string $opponent, string $user)
    {
        $this->elementsWin = $elementsWin;
        $this->opponent = $opponent;
        $this->user = $user;
    }

    public function winner(): string
    {
        if ($this->user == $this->opponent) {
            return "It's a tie!" . PHP_EOL;
        }

        if (in_array($this->opponent, $this->elementsWin[$this->user])) {
            return "You win!" . PHP_EOL;
        } else {
            return "Opponent wins!" . PHP_EOL;
        }
    }


}
$user = trim(strtolower(readline("Rock, paper, scissors, lizard or spock? ")));
$elements = [
    new Element("rock"),
    new Element("scissors"),
    new Element("paper"),
    new Element("spock"),
    new Element("lizard")
];
$opponent = new Opponents($elements);
$opponentChoice = $opponent->randElement()->getName();
$elementsWin = [
    "rock" => ["scissors", "lizard"],
    "paper" => ["rock", "spock"],
    "scissors" => ["paper", "lizard"],
    "lizard" => ["paper", "spock"],
    "spock" => ["rock", "scissors"]
];
$winner = new Game($elementsWin, $opponentChoice, $user);
echo "Your choice: " . $user . PHP_EOL;
echo "Opponent's choice: " . $opponentChoice . PHP_EOL;
echo $winner->winner();