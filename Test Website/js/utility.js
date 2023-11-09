/*
* Author: Joshua Mckenna
* Date: 2023/03/11
* Purpose: These are some export functions that are used often and will be reused from project to project
*
* Updated: 2023/03/24 by Joshua Mckenna
* */


/**
 * This makes sure input text boxs have a selected answer or not
 * if they dont have a inputed text box for answers they display the required Message
 * @param elemID
 * @param elemErrorID
 * @returns {boolean}
 */


export function isTextAnswered(elemID, elemErrorID = undefined) {
    let output = false;
    if (elemID.value.length < 1) {
        if (elemErrorID !== undefined) {
            elemErrorID.style.display = "inline-block";
        }
    } else if (elemID.value.length >= 1) {
        output = true;
        if (elemErrorID !== undefined) {
            elemErrorID.style.display = "none";
        }
    }
    return output;
}

/**
 * This makes sure input text boxs have a selected answer or not
 * if they dont have a inputed text box for answers they display the required Message
 * @param elemID
 * @param elemErrorID
 * @returns {boolean}
 */

export function isCheckBoxAnswered(elemID, elemErrorID = undefined) {
    return isRadioAnswered(elemID, elemErrorID);
}

/**
 * This makes sure input text boxs have a selected answer or not
 * if they dont have a inputed text box for answers they display the required Message
 * @param elemID
 * @param elemErrorID
 * @returns {boolean}
 */

export function isRadioAnswered(elemID, elemErrorID = undefined) {
    let output = false;
    if (elemID instanceof NodeList) {
        for (let i = 0; i < elemID.length; i++) {
            if (elemID[i].checked) {
                if (elemErrorID !== undefined) {
                    elemErrorID.style.display = "none";
                }
                return true;
            }
        }
        if (elemErrorID !== undefined) {
            elemErrorID.style.display = "inline-block";
        }
        return false;
    } else if (elemID instanceof Element) {
        if (elemID.checked) {
            if (elemErrorID !== undefined) {
                elemErrorID.style.display = "none";
            }
            return true;
        } else {
            if (elemErrorID !== undefined) {
                elemErrorID.style.display = "inline-block";
            }
            return false;
        }
    } else {
        throw("FAILED TO CHECK. THIS IS NOT A NODELIST OR ELEMENT" + elemID);
    }
}


/**
 *  Checks for Answers and if there is no answer than
 *  it returns false and shows the required message
 *  if there is answer it returns the true and hides the required message
 * @param elemID
 * @param elemErrorID
 * @param NotAOpt  What is the Value that is being assigned the default slot.
 * @returns {boolean}
 */
export function isSelectAnswered(elemID, elemErrorID = undefined, NotAOpt = "0") {
    let flag = false;
    if (elemID.value === NotAOpt) {
        if (elemErrorID !== undefined) {
            elemErrorID.style.display = "inline-block";
        }
    } else {
        flag = true;
        if (elemErrorID !== undefined) {
            elemErrorID.style.display = "none";
        }
    }
    return flag
}


/**
 *  Checks for Answers and if there is no answer than it returns none
 *  if there is answer it returns the answer
 * @param elemID dropdown Menu ID
 * @returns {string} Answer || none
 */
export function selectHasAnswer(elemID) {


    let output = elemID.value !== "0" ? elemID.options[elemID.selectedIndex].textContent : "none";
    return output;
}

/**
 *  Checks for Answers and if there is no answer than it returns none
 *  if there is answer it returns the answer
 * @param elemID textboxID
 * @returns {string} Answer || none
 */
export function textHasAnswer(elemID) {
    let output = elemID.value.length !== 0 ? elemID.value : "none";
    return output;
}

/**
 *  Checks for Answers and if there is no answer than it returns none
 *  if there is answer it returns the answer
 * @param elemID radio button id
 * @returns {string} Answer || none
 */
export function getRadioAnswer(elemID) {
    let output = false;
    if (elemID instanceof NodeList) {
        for (let i = 0; i < elemID.length; i++) {
            if (elemID[i].checked) {
                return elemID[i].value;
            }
        }
        return "none";
    } else if (elemID instanceof Element) {
        if (elemID.checked) {
            return elemID.value;
        } else {
            return "none";
        }
    } else {
        throw("FAILED TO CHECK. THIS IS NOT A NODELIST OR ELEMENT" + elemID);
    }
}

/**
 *  Checks for Answers and if there is no answer than it returns none
 *  if there is answer it returns the answer
 * @param elemID group of checkboxs
 * @returns {string} Answer || none
 */
export function getCheckboxListAnswers(elemID) {
    if (elemID instanceof NodeList) {
        if (isRadioAnswered(elemID)) {
            let output = "";
            for (let i = 0; i < elemID.length; i++) {
                if (elemID[i].checked === true) {
                    if (output.length !== 0) {
                        output += ", "
                    }
                    output += elemID[i].value
                }
            }
            return output;
        } else {
            return "none";
        }
    } else {
        throw("FAILED TO CHECK. THIS IS NOT A NODELIST" + elemID);
    }
}

/**
 * Unchecks the all the other unboxs in the a multi checkboxs selector
 * @param elemID
 * @param value The value of the checkbox that is going to uncheck the rest
 * @param needed This is set by default to true, Set it 2 if this is used on the same collection!
 */
export function uncheckRestOfBoxsEvent(elemID, value = "above") {
    for (let i = 0; i < elemID.length; i++) {
        elemID[i].addEventListener("click", (event) => {
            if (event.target.value !== value) {
                for (let j = 0; j < elemID.length; j++) {
                    // alert(question7[j].value + "vs" + event.target.value)
                    if (elemID[j].value === value) {
                        elemID[j].checked = false;
                    }
                }
            } else {
                for (let j = 0; j < elemID.length; j++) {
                    // alert(question7[j].value + "vs" + event.target.value)
                    if (elemID[j].value !== value) {
                        elemID[j].checked = false;
                    }
                }
            }
        });
    }
}

export function CombineArrys(array1, array2){
    let output = [array1, array2] //Array destruction
    return output;
}