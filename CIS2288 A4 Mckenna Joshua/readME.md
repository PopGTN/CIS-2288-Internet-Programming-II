# The Vinyl Creator
## **Assignment 4**

For this assignment you will be using the object oriented features of PHP to design a music album processing page.

First you will build a form page called addAlbum.php.  This form will contain text fields for album title, artist, publisher (Sony, BMI, etc.) and genre.  Add two more fields of your choice.  You will post this form to the file **process.php.**

If all the fields have values, we will create a new Album object and print the details of the object.  You will need to create an Album class that has **private **instance variables for all the fields just described. Your constructor should simply echo to the screen "Album created." If the user missed some of the form, give them a link to go back and fix.

Generate standard getters/setters

You will need to create __get and __set functions (magic functions) to allow us to set the properties of the instance variables from outside the class. You will also create a function (or method) called __toString() in the class.  Calling this will return a  a formatted string of all the details for the album.  Store the class in **album.class.php**.

Include a hyperlink back to add another album.

Sample output could look like this:

### **Album Created**

**Album Title:** Blaze of Glory\
**Artist:** Jon Bon Jovi\
**Publisher:** ASCAP\
**Genre:** Rock\
**Custom Field**: stuff\
**Another Custom Field**: stuff

[Add another album!](https://sam.hollandcollege.com/d2l/le/content/63184/Home#)

**Marking Matrix**

-   /5   Comments on all pages, proper page names (as requested), aligned code, overall effort
-   /10 addAlbum.php page is complete - doctype, complete html structure and some instructions that give the user some indication of what they are to do
-   /30 album.class.php - contains code to define album class - as well as documentation/comments to outline how to use - see requirements for details (private vars, constructor, magic methods(__get(),__set() and  __toString functions)
-   /5   Some type of validation used so that user knows about errors
-   /10 Styles for all pages: Use an external stylesheet for all styles. **All** page content should be in a div with an id set to 'container', 650px wide and the content centered. The container div should also be centered on the screen (horizontally). The constructor text should be echoed using an <h3> tag. Please bold all labels as displayed above. 
-   Total: /60
-   For /5 bonus points (applied to this assignment. max is 60) use the Button class to print the submit button on the form page addAlbum.php.

**Submit** addAlbum.php, process.php and album.class.php (and any button related files if you attempt this)