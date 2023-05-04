<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    // FILTER PARKING
    if (!empty($_GET['parking'])) {
        $parking = $_GET['parking'];
        $filteredHotels = [];
        foreach ($hotels as $hotel) {
            if ($parking === "true" && $hotel['parking'] === true) {
                $filteredHotels[] = $hotel;
            } 
            elseif ($parking === "false" && $hotel['parking'] === false) {
                $filteredHotels[] = $hotel;
            }
        }
    } 
    else {
        $filteredHotels = $hotels;
    }

    // FILTER VOTE
    if (!empty($_GET['vote'])) {
        $vote = $_GET['vote'];
        if (!empty($_GET['parking'])) {
            $filteredVote = [];
            foreach ($filteredHotels as $hotel) {
                if ($hotel['vote'] == $vote) {
                    $filteredVote[] = $hotel;
                }
            }
            $filteredHotels = $filteredVote;
        } 
    else {
            $filteredVote = [];
            foreach ($hotels as $hotel) {
                if ($hotel['vote'] == $vote) {
                    $filteredVote[] = $hotel;
                }
            }
            $filteredHotels = $filteredVote;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP Hotel</title>
</head>

<body class="d-flex flex-column align-items-center">
    <img src="./img/logo.png" alt="logo">
    <h1>PHP Hotels</h1>
    <h4>Find the perfect hotel for you</h4>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET" class="container mb-4 d-flex justify-content-center align-items-center w-50 gap-5">
    <div class="filter-parking d-flex align-items-center gap-2 w-25">
        <label for="parking" class="fw-semibold">Parking</label>
        <select name="parking" id="parking" class="w-100">
            <option value="" selected>Choose</option>
            <option value="true">free parking</option>
            <option value="false">without parking</option>
        </select>
    </div>
    <div class="filter-vote d-flex align-items-center gap-2 w-25">
        <label for="vote" class="fw-semibold">Vote</label>
        <select name="vote" id="vote" class="w-100">
            <option value="" selected>Choose</option>
            <option value="1">1 star</option>
            <option value="2">2 stars</option>
            <option value="3">3 stars</option>
            <option value="4">4 stars</option>
            <option value="5">5 stars</option>
        </select>
    </div> 
        
        <div class="box-button">
            <button type="submit" class="btn btn-danger">Search</button>
        </div> 
    </form>
    
    <div class="container table-box">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to center</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filteredHotels as $hotel) { ?>
                    <tr>
                        <td><?php echo $hotel['name'] ?></td>
                        <td><?php echo $hotel['description'] ?></td>
                        <td class="text-success fw-semibold text-decoration-underline"><?php echo $hotel['parking'] === true ? 'Available' : $hotel['parking'] ?></td>
                        <td><?php echo $hotel['vote'] ?> <span class="star">&#9733;</span></td>
                        <td><?php echo $hotel['distance_to_center'] . ' ' . 'km' ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>   
</body>
</html>