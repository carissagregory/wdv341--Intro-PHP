<?php
//This is a class file for wdv341_events table
//Author: 
//Date: 10/22/24

class Event {
    //properties

    private $eventsID;
    public  $eventsName;
    public  $eventsDescription;
    private $eventsPresenter;
    public  $eventsDate;
    public  $eventsTime;
    


    //constructor method- It sets the default values of the properties in the NEW object 
    //                        DOES NOT CREATE THE NEW OBJECT

    function _construct(){
        //usually use an empty (no parameters)
        //set the default value of the properties of the new object
        $this->eventsID = 0;
        $this->eventsName = "";
        $this->eventsDescription = "";
        $this->eventsPresenter = "";
        $this->eventsDate = "";
        $this->eventsTime = "";
    }

    //methods
    //  setters/getters   acessors/mutators
    //      setter- take an input value and applies to a property
    //      getter- returns the value of a property
    function setEventsID($inID){
        $this->eventsID = $inID; // assign the input value to the property
    }
    function getEventsID(){
        return $this->eventsID;     //return the value to the function call
    }

    function setEventsName($inName){
        $this->eventsName = $inName; 
    }
    function getEventsName(){
        return $this->eventsName;     
    }

    function setEventsDescription($inDescription){
        $this->eventsDescription = $inDescription; 
    }
    function getEventsDescription(){
        return $this->eventsDescription;     
    }

    function setEventsPresenter($inPresenter){
        $this->eventsPresenter = $inPresenter; 
    }
    function getEventsPresenter(){
        return $this->eventsPresenter;     
    }

    function setEventsDate($inDate){
        $this->eventsDate = $inDate; 
    }
    function getEventsDate(){
        return $this->eventsDate;     
    }

    function setEventsTime($inTime){
        $this->eventsTime = $inTime; 
    }
    function getEventsTime(){
        return $this->eventsTime;     
    }

    //  processing methods

}



?>