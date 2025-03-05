<?php 

class TravelOffer
{
    private int $id;
    private string $title;
    private string $destination;
    private string $departure_date;
    private string $return_date;
    private float $price;
    private bool $disponible;
    private string $category;

    // Constructeur
    public function __construct(
        string $title = "",
        string $destination = "",
        string $departure_date = "",
        string $return_date = "",
        float $price = 0.0,
        bool $disponible = true,
        string $category = ""
    ) {
        $this->title = $title;
        $this->destination = $destination;
        $this->departure_date = $departure_date;
        $this->return_date = $return_date;
        $this->price = $price;
        $this->disponible = $disponible;
        $this->category = $category;
    }

    // Affichage des informations sous forme de tableau HTML
    public function display(): void {
        echo '<table border="1" width="100%">
            <tr align="center">
                <th>Title</th>
                <th>Destination</th>
                <th>Departure Date</th>
                <th>Return Date</th>
                <th>Price (€)</th>
                <th>Availability</th>
                <th>Category</th>
            </tr>
            <tr align="center">
                <td>' . htmlspecialchars($this->title) . '</td>
                <td>' . htmlspecialchars($this->destination) . '</td>
                <td>' . htmlspecialchars($this->departure_date) . '</td>
                <td>' . htmlspecialchars($this->return_date) . '</td>
                <td>' . number_format($this->price, 2, ',', ' ') . ' €</td>
                <td>' . ($this->disponible ? 'Available' : 'Not Available') . '</td>
                <td>' . htmlspecialchars($this->category) . '</td>
            </tr>
        </table>';
    }

    // Getters
    public function getTitle(): string {
        return $this->title;
    }

    public function getDestination(): string {
        return $this->destination;
    }

    public function getDepartureDate(): string {
        return $this->departure_date;
    }

    public function getReturnDate(): string {
        return $this->return_date;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function isDisponible(): bool {
        return $this->disponible;
    }

    public function getCategory(): string {
        return $this->category;
    }

    // Setters
    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function setDestination(string $destination): void {
        $this->destination = $destination;
    }

    public function setDepartureDate(string $departure_date): void {
        $this->departure_date = $departure_date;
    }

    public function setReturnDate(string $return_date): void {
        $this->return_date = $return_date;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function setDisponible(bool $disponible): void {
        $this->disponible = $disponible;
    }

    public function setCategory(string $category): void {
        $this->category = $category;
    }
}
?>
