<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
        display: flex;
        justify-content: center;
        /*align-items: center;*/
        min-height: 100vh;
        margin: 0;
        background-image: url("/photos/bkgd1.png");
        background-size: 10%;
    }

    main {
        background-color: whitesmoke;
        width: 50vw;

    }
    .main {
        padding: 0px !important;
        background-color: whitesmoke;
    }

    /*Boarder wouldn't work had to use margins for boarders*/
    header > h1 {
        color: black;
        background-size: contain;
        padding-top: 5% !important;
        padding-bottom: 5% !important;
        font-size: 2em;
        margin-bottom: 0px;
        padding-right: 5%;
        padding-left: 5%;
        margin-top: 1%;

    }
    header {
        /*margin-top: 1% !important;*/
        background: url("../photos/bkgd2.png");
        background-size: 30%;
        margin-right: 0.5%;
        margin-left: 0.5%;

    }
    .body{
       padding: 5%;
    }

    .taxformtable{

    }



    @media screen and (max-width: 600px) {
        main {
            width: 100vw; /* take up the full width */
            /*box-sizing: border-box; !* so padding doesn't add to the width *!*/
            /*padding: 10px; !* optional - add some space around the content *!*/
        }
        header {
        }
        /* Adjust font size for mobile devices */
        body, input, select, textarea {
            /*font-size: 20%; !* adjust as needed *!*/
        }
    }

</style>
