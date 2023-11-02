<?php

class album
{

    private $albumTitle;
    private $artist;
    private $publisher;
    private $genre;
    private $songs = [];
    private $data = array();

    /**
     * @param string $albumTitle
     * @param string $artist
     * @param string $publisher
     * @param string $genre
     * @param array $songs
     */
    public function __construct($albumTitle, $artist, $publisher, $genre, $songs)
    {
        $this->albumTitle = $albumTitle;
        $this->artist = $artist;
        $this->publisher = $publisher;
        $this->genre = $genre;
        $this->songs = $songs;
    }
    /**
     * The __get() method (Magic Methods) is called whenever you attempt to read a non-existing
     * or private property of an object.
     *
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }else{
            //returns the value of the attribute even though it is private/hidden
            return $this->$name;
        }

    }

    /**
     * The __set() method (Magic Methods) is called whenever you attempt to write to
     * a non-existing or private property of an object.
     *
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if(property_exists($this,$name)) {

            $this->$name = $value;

        }else{
            //An associative array s created when a property that has not been declared is set
            $this->data[$name] = $value;

        }
    }

    public function __toString()
    {
        return "Album: {$this->albumTitle} \t
        Artist: {$this->artist} \t
        Publisher: {$this->publisher} \t
        Genre: {$this->genre} \t
        Songs: ". implode(", ", $this->songs);
    }

}