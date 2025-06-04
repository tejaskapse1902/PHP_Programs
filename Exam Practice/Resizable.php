<?php
interface Resizable {
    public function resize( $percentage );
}

class Square implements Resizable {
    private $side;

    public function __construct( $side ) {
        $this->side = $side;
    }

    public function resize( $percentage ) {
        $this->side = $this->side * ( $percentage / 100 );
    }

    public function getArea() {
        return pow( $this->side, 2 );
    }

    public function getSide() {
        return $this->side;
    }
}
$square = new Square( 10 );
echo 'Initial Side Length: ' . $square->getSide() . '</br>';
$square->resize( 60 );
// Resize the square to 60% of its original size
echo 'Resized Side Length: ' . $square->getSide() . '</br>';
echo 'Area: ' . $square->getArea() . '</br>';
?>