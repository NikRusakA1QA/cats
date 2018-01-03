<?php

    /**
     * Класс для работы с котами.
     */

    class Cat {

        const FIRSTWORD = 'Meow!';

        private static $canFly = False;
        private $name;
        private $age;
        private $hairColors;
        private $isAlive;

        /**
         * Метод является конструктором, вызывается при каждом создании
         *     нового объекта, так что это может оказаться полезным, например,
         *     для инициализации какого-либо состояния объекта перед его
         *     использованием.
         * @param String  $name       Имя кота.
         * @param Integer $age        Возраст кота.
         * @param Array   $hairColors Массив строк цвета волос кота.
         */
        function __construct($name, $age, $hairColors) {
            $this->name = $name;
            $this->age = $age;
            $this->hairColors = $hairColors;
            $this->isAlive = True;
        }

        /**
         * Метод, который всегда при вызове будет выбрасывать исключение.
         * @throws Exception Исключение с сообщением "That's my error".
         */
        function error() {
            throw new Exception("That's my error");
        }

        /**
         * Геттер возраста кота.
         * @return Integer Возраст кота.
         */
        function getCatAge() {
            return $this->age;
        }

        /**
         * Метод возвращает булево в зависимости от того, может ли кот
         *     летать или нет.
         * @return Boolean Возможность кота летать.
         */
        function ifCatsCanFly() {
            return self::$canFly;
        }

        /**
         * Деструктор будет вызван при освобождении всех ссылок на
         *     определенный объект или при завершении скрипта (порядок
         *     выполнения деструкторов не гарантируется).
         */
        function __destruct() {
            $this->isAlive = False;
        }
    }
?>
