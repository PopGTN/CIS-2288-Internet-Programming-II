import * as util from './js/utility.js';

window.addEventListener("DOMContentLoaded", init);


function init() {
    /*Question 1*/
    let question1 = document.getElementById("Question1");
    let question1Error = document.getElementById("Question1Error");

    /*Question 2*/
    let question2 = document.getElementById("Question2");
    let question2Error = document.getElementById("Question2Error");

    /*Question 3*/
    let question3 = document.getElementById("Question3");
    let question3Error = document.getElementById("Question3Error");

    /*Question 4*/
    let question4 = document.getElementById("Question4");
    let question4Error = document.getElementById("Question4Error");

    /*Question 5*/
    let question5 = document.getElementsByName("Question5");
    let question5Error = document.getElementById("Question5Error");

    /*Question 6*/
    let question6 = document.getElementsByName("Question6");
    let question6Error = document.getElementById("Question6Error");

    /*Question 7*/
    let question7 = document.getElementsByName("Question7[]");
    let question7Error = document.getElementById("Question7Error");

    let output = document.getElementById("score");

    util.uncheckRestOfBoxsEvent(question7);
    util.uncheckRestOfBoxsEvent(question7, "allOfAbove")

    document.getElementById("submit").addEventListener("click", (event) => {
        if (isNotCompleted()) {
            let score = checkAnswers();
                if(score < 51){
                    output.style.color = "red";
                    output.innerText = "You got a " + score + "%. At least you tried!";
                } else if (score < 81){
                    output.style.color = "orange";
                    output.innerText = "You got a " + score + "%. Good effort!";
                } else if (score > 81){
                    output.style.color = "limegreen";
                    output.innerText = "You got a " + score + "%. Great job!!! Your Super Smart!!!";
                }
            alert("Completed!");
        }
    });

    /*
    This Function checks if everything was filled out.
     */
    function isNotCompleted() {
        let qt1 = util.isTextAnswered(question1, question1Error);
        let qt2 = util.isTextAnswered(question2, question2Error);
        let qt3 = util.isSelectAnswered(question3, question3Error);
        let qt4 = util.isSelectAnswered(question4, question4Error);
        let qt5 = util.isRadioAnswered(question5, question5Error);
        let qt6 = util.isRadioAnswered(question6, question6Error);
        let qt7 = util.isCheckBoxAnswered(question7, question7Error);
        // alert(qt1 + '\n' + qt2 + '\n' + qt3 + '\n' + qt4 + '\n' + qt5 + '\n' + qt6 + '\n' + qt7);
        let output = qt1 && qt2 && qt3 && qt4 && qt5 && qt6 && qt7;
        return output;
    }

    /*
    * This function checks the answers and then calculates the score.
    * */
    function checkAnswers(){
        let score = 0;
        if (question1.value.toLowerCase().trim() === "john blankenbaker"){score++;}
        if (question2.value.toLowerCase().trim() === "microsoft"){score++;}
        if (question3.value === "2"){score++;}
        if (question4.value === "1"){score++;}
        if (util.getRadioAnswer(question5) === "1"){score++;}
        if (util.getRadioAnswer(question6) === "3"){score++;}
        if (util.getCheckboxListAnswers(question7) === "RAM, CPU, Motherboard, Power Supply, Storage"){score++;}
        score = (score/7) * 100;
        return score.toFixed(2);
    }
}

