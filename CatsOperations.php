<?php

    require 'Cat.php';

    // Пункт 1.a.
    $catsArray = array();

    for ($i=0; $i < 5; $i++) {
        array_push($catsArray, new Cat(generateName(), generateAge(1, 10), generateHairColors(3)));
    }

    // Пункт 1.b.
    $catsAgeSum = 0;
    $catsAgeOp = 1;
    foreach ($catsArray as $cat) {
        $catsAgeSum += $cat->getCatAge();
        $catsAgeOp *= $cat->getCatAge();
    }

    echo "Created cats' age sum is " . $catsAgeSum . ".\n";
    echo "Created cats' age operation is " . $catsAgeOp . ".\n";

    // Пункт 1.c.
    $olderThanThree = 0;
    $sqrtAgeSum = 0;

    foreach ($catsArray as $cat) {
        if ($cat->getCatAge() > 3) {
            $olderThanThree++;
            $sqrtAgeSum += pow($cat->getCatAge(), 2);
        }
    }

    echo "Count of cats with older than three years: " . $olderThanThree . ".\n";
    if ($olderThanThree > 0) {
        echo "Squares sum of cats older than three years: " . $sqrtAgeSum . ".\n";
    }

    // Пункт 1.d.
    $randomCatId = array_rand($catsArray, 1);
    try {
        $catsArray[$randomCatId]->error();
    } catch (Exception $e) {
        echo "Exception thrown out: " . $e->getMessage() . ".\n";
    }

    // Пункт 1.e.
    for ($i=1; $i <= 100; $i++) {
        for ($j=1; $j <= 100; $j++) {
            if (($i * $j) % 29 == 0) {
                echo "First index is " . $i . ", second is " . $j . ". Using goto...\n";
                goto exitCycle;
            }
        }
    }

    exitCycle:
    echo "Cycle end here!\n";

    // Пункт 1.f.
    if (Cat::ifCatsCanFly() == False) {
        echo "Of course no, are you crazy? Cats can't fly, they're not a birds!\n";
    } else {
        echo "Shocking, but yes, cats can fly. Check it one more time, is it correct?\n";
    }

    // Генерация имен, набора цвет волос и возраста котов.
    /**
     * Метод генерирует слово, состоящее из двух слов, случайным образом выбранных
     *     из массива доступных имен.
     * @return String Сгенерированное имя.
     */
    function generateName() {
        $namesArray = array('Lorem', 'Ipsum', 'Dolor', 'Sit', 'Amet',
                            'Consectetur', 'Adipiscing', 'Elit', 'Sed', 'Do',
                            'Eiusmod', 'Tempor', 'Incididunt', 'Ut');
        shuffle($namesArray);
        $randIndices = array_rand($namesArray, 2);

        return $namesArray[$randIndices[0]] . " " . $namesArray[$randIndices[1]];
    }

    /**
     * Метод генерирует и возвращает массив цветов волос кота, исходя из
     *     передаваемого желаемого количества цветов.
     * @param  Integer $colorsCount Желаемое количество цветов.
     * @return Array                Массив цветов волос кота.
     */
    function generateHairColors($colorsCount) {
        $colorsArray = array('aqua', 'black', 'blue', 'fuchsia', 'gray',
                             'green', 'lime', 'maroon', 'navy', 'olive',
                             'orange', 'purple', 'red', 'silver', 'teal',
                             'white', 'yellow');
        shuffle($colorsArray);
        $randIndices = array_rand($colorsArray, $colorsCount);
        $hairColors = array();
        for ($i=0; $i < $colorsCount; $i++) {
            array_push($hairColors, $colorsArray[$randIndices[$i]]);
        }

        return $hairColors;
    }

    /**
     * Метод генерирует и возвращает возраст кота между минимальным и максимальным
     *     переданными значениями.
     * @param  Integer $minAge Минимальный порог возраста кота.
     * @param  Integer $maxAge Максимальный порог возраста кота.
     * @return Integer         Возраст кота.
     */
    function generateAge($minAge, $maxAge) {
        return random_int($minAge, $maxAge);
    }
?>
