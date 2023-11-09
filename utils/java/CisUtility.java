package info.hccis.util;

import java.text.NumberFormat;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.Scanner;

/**
 * Has some useful methods to be used in our programs.
 *
 * @author bjmaclean
 * @since Oct 19, 2021
 *
 * @modified by Joshua Mckena @since 2023/11/06
 */
public class CisUtility {

    private static Scanner input = new Scanner(System.in);

    /**
     * Return the default currency String value of the double passed in as a
     * parameter.
     *
     * @param inputDouble double to be formatted
     * @return String in default currency format
     *
     * @since 20211020
     * @author BJM
     */
    public static String toCurrency(double inputDouble) {
        NumberFormat formatter = NumberFormat.getCurrencyInstance();
        return formatter.format(inputDouble);
    }

    /**
     * Get input from the user using the console
     *
     * @param prompt Prompt for the user
     * @return String entered by the user
     * @since 20211020
     * @author BJM
     */
    public static String getInputString(String prompt) {

        System.out.println(prompt + " -->");
        String output = input.nextLine();
        return output;
    }

    /**
     * Get input from the user using the console
     *
     * @param prompt Prompt for the user
     * @return The double entered by the user
     * @since 20211020
     * @author BJM
     */
    public static double getInputDouble(String prompt) {

        String inputString = getInputString(prompt);
        double output = Double.parseDouble(inputString);
        return output;
    }

    /**
     * Get input from the user using the console
     *
     * @param prompt Prompt for the user
     * @return The double entered by the user
     * @since 20211020
     * @author BJM
     */
    public static int getInputInt(String prompt) {

        String inputString = getInputString(prompt);
        int output = Integer.parseInt(inputString);
        return output;
    }

    /**
     * Provide today's date in the specified format
     *
     * @param format Date format desired
     * @return Today's date in specified format
     * @since 20211021
     * @author BJM
     */
    public static String getTodayString(String format) {
        //https://www.javatpoint.com/java-get-current-date

        DateTimeFormatter dtf = DateTimeFormatter.ofPattern(format);
        LocalDateTime now = LocalDateTime.now();
        return dtf.format(now);

    }

    /**
     * @author Joshua Mckenna
     * @since 2023/11/06
     * @param message
     * @param errorMsg
     * @return
     */
    public static int TypeSafeGetInt(String message, String errorMsg){
        int output = 0;
        boolean isValid = true;
        do {
            String input = CisUtility.getInputString(message);
            try {
                output = Integer.parseInt(input);

            } catch (NumberFormatException ex) {
//            ex.printStackTrace();
                isValid = false;
                System.out.println(errorMsg);
            }
        } while (!isValid);
        return output;
    }

    /**
     * @author Joshua Mckenna
     * @since 2023/11/06
     * @param message
     * @return
     */
    public static int TypeSafeGetInt(String message){
        return TypeSafeGetInt(message, "Not a valid Int");
    }

    /**
     * @author Joshua Mckenna
     * @since 2023/11/06
     * @param message
     * @param errorMsg
     * @return
     */
    public static double TypeSafeGetDouble(String message, String errorMsg){
        double output = 0;
        boolean isValid = true;
        do {
            String input = CisUtility.getInputString(message);
            try {
                output = Double.parseDouble(input);

            } catch (NumberFormatException ex) {
//            ex.printStackTrace();
                isValid = false;
                System.out.println(errorMsg);
            }
        } while (!isValid);
        return output;
    }

    /**
     * @author Joshua Mckenna
     * @since 2023/11/06
     * @param message
     * @return
     */
    public static double TypeSafeGetDouble(String message){
        return TypeSafeGetDouble(message, "Not a valid Double");
    }


}
