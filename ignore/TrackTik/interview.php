<?php

// Using the code given, create each type of electronic as classes.
// Every Electronic Item must have a function called maxExtras that limits the number of extras an electronic item can have.
// The extras are a list of electronic items that are attached to another electronic item to complement it.

// The console can have a maximum of 4 extras
// The television has no maximum extras
// The microwave can't have any extras
// The controller can't have any extras

// Create a scenario where a person would buy a console, 2 televisions with different prices and a microwave.
// The console and television have extras and they are controllers.
// The console has 2 remote controllers and 2 wired controllers. TV 1 has 2 remote controllers and TV 2 has 1 remote controller.
// Sort the items by price and output the total pricing.
// Moreover, that person's friend saw him with his new purchase and asked him how much the console and its controllers cost him. Give him the answer.

class ElectronicItems {

    private $items = array();

    public function __construct(array $items) {

        $this->items = $items;
    }

    /**
     * Returns the items depending on the sorting type requested
     *
     * @param $type
     * @return bool
     */
    public function getSortedItems($type) {

        $sorted = array();
        foreach ( $this->items as $item ) {

            $sorted[($item->price * 100)] = $item;
        }

        return ksort($sorted, SORT_NUMERIC);
    }

    /**
     *
     * @param string $type
     * @return bool
     */
    public function getItemsByType( $type ) {

        if ( in_array($type, ElectronicItem::$types) ) {

            $callback = function ($item) use ($type) {

                return $item->type == $type;
            };

            $items = array_filter($this->items, $callback);
        }

        return false;
    }
}

class ElectronicItem {

    /**
     * @var float
     */
    public $price;

    /**
     * @var string
     */
    private $type;
    public $wired;

    const ELECTRONIC_ITEM_TELEVISION = 'television';
    const ELECTRONIC_ITEM_CONSOLE = 'console';
    const ELECTRONIC_ITEM_MICROWAVE = 'microwave';

    public static $types = array(
        self::ELECTRONIC_ITEM_CONSOLE,
        self::ELECTRONIC_ITEM_MICROWAVE,
        self::ELECTRONIC_ITEM_TELEVISION
    );

    function getPrice() {
        return $this->price;
    }

    function getType() {
        return $this->type;
    }

    function getWired() {
        return $this->wired;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setWired($wired) {
        $this->wired = $wired;
    }
}