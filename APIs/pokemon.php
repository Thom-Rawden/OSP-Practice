<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name'])) {
    $pokemonName = strtolower($_POST['name']);
    $url = "https://pokeapi.co/api/v2/pokemon/" . $pokemonName;
    $response = file_get_contents($url);

    if ($response !== false) {
        $data = json_decode($response, true);
        $name = $data['name'];
        $sprite = $data['sprites']['front_default'];
        echo "Name: " . $name . "<br>";
        echo "Sprite: <img src='" . $sprite . "' alt='" . $name . "'><br>";

        $speciesUrl = $data['species']['url'];
        $speciesResponse = file_get_contents($speciesUrl);
        if ($speciesResponse !== false) {
            $speciesData = json_decode($speciesResponse, true);
            $evolutionUrl = $speciesData['evolution_chain']['url'];

            $evolutionResponse = file_get_contents($evolutionUrl);
            if ($evolutionResponse !== false) {
                $evolutionData = json_decode($evolutionResponse, true);
                $chain = $evolutionData['chain'];

                echo "<br><strong>Evolution Chain:</strong><br>";

                function printEvolutions($node) {
                    $speciesName = $node['species']['name'];
                    echo "Name: " . $speciesName . "<br>";

                    $pokeUrl = "https://pokeapi.co/api/v2/pokemon/" . strtolower($speciesName);
                    $pokeResponse = file_get_contents($pokeUrl);
                    if ($pokeResponse !== false) {
                        $pokeData = json_decode($pokeResponse, true);
                        $sprite = $pokeData['sprites']['front_default'];
                        echo "Sprite: <img src='" . $sprite . "' alt='" . $speciesName . "'><br>";
                    }

                    foreach ($node['evolves_to'] as $evolution) {
                        printEvolutions($evolution);
                    }
                }

                printEvolutions($chain);
            } else {
                echo "Could not retrieve evolution chain.";
            }
        } else {
            echo "Could not retrieve species data.";
        }
    } else {
        echo "Pokemon not found.";
    }
}
?>