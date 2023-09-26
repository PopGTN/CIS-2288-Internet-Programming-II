<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
        display: flex;
        justify-content: center;
        /*align-items: center;*/
        min-height: 100vh;
        margin: 0;
        background-image: url("/photos/bkgd1.jpg");
        background-size: 30%;
    }

    main, form {
        width: 50%; /* or whatever width you want */
        background-color: whitesmoke;
        padding: 5%;
    }

    @media screen and (max-width: 600px) {
        #main {
            width: 100%; /* take up the full width */
            box-sizing: border-box; /* so padding doesn't add to the width */
            /*padding: 10px; !* optional - add some space around the content *!*/
        }
        /* Adjust font size for mobile devices */
        body, input, select, textarea {
            font-size: 20%; /* adjust as needed */
        }
    }
</style>
