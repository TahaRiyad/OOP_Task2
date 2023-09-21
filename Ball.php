<?php


class Ball
{
    private $radius;
    private $x;
    private $y;
    private $deltaX;
    private $deltaY;

    public function __construct($radius, $x, $y, $deltaX, $deltaY)
    {
        $this->radius = $radius;
        $this->x = $x;
        $this->y = $y;
        $this->deltaX = $deltaX;
        $this->deltaY = $deltaY;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function move()
    {
        $this->x += $this->deltaX;
        $this->y += $this->deltaY;
    }

    public function reflectHorizontal()
    {
        $this->deltaX *= -1;
    }

    public function reflectVertical()
    {
        $this->deltaY *= -1;
    }
}


$ball = new Ball(10, 50, 50, 5, 2);

for ($i = 0; $i < 5; $i++) {
    echo "Position (x, y): ({$ball->getX()}, {$ball->getY()})" . "<br>";
    $ball->move();
    if ($ball->getX() < 0 || $ball->getX() > 100) {
        $ball->reflectHorizontal();
    }
    if ($ball->getY() < 0 || $ball->getY() > 100) {
        $ball->reflectVertical();
    }
}
