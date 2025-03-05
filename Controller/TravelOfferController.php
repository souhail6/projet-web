<?php 
class TravelOfferController 
{
    public function displayTravelOffer($offer) {
        echo '<table border="1" width="100%">
            <tr align="center">
                <th>Title</th>
                <th>Destination</th>
                <th>Departure Date</th>
                <th>Return Date</th>
                <th>Price</th>
                <th>Availability</th>
                <th>Category</th>
            </tr>
            <tr align="center">
                <td>' . htmlspecialchars($offer->getTitle()) . '</td>
                <td>' . htmlspecialchars($offer->getDestination()) . '</td>
                <td>' . htmlspecialchars($offer->getDepartureDate()) . '</td>
                <td>' . htmlspecialchars($offer->getReturnDate()) . '</td>
                <td>' . number_format($offer->getPrice(), 2, ',', ' ') . ' €</td>
                <td>' . ($offer->isDisponible() ? 'Available' : 'Not Available') . '</td>
                <td>' . htmlspecialchars($offer->getCategory()) . '</td>
            </tr>
        </table>';
    }

    public function fetchTravelOffers() {
        try {
            $db = config::getConnexion();
            $query = $db->prepare("SELECT * FROM travel_offer");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }
}
