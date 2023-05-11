import java.util.Scanner;

public class MyDay {
    public int date, month, year, day;

    public MyDay() {
        Scanner input = new Scanner(System.in);
        System.out.println("Enter your Date of Birth. Like DD/MM/YY Format");
        System.out.print("Date in two digits (DD) : ");
        date = input.nextInt();
        System.out.print("Month in two digits (MM) : ");
        month = input.nextInt();
        System.out.print("Year in four digits (YYYY) : ");
        year = input.nextInt();
    }

    public int getDate() {
        return date;
    }

    public int getDay() {
        return day;
    }

    public int getMonth() {
        return month;
    }

    public int getYear() {
        return year;
    }

    public static boolean isLeapYear(int yy) {
        if (yy % 100 == 0) {
            return yy % 400 == 0;
        } else {
            return yy % 4 == 0;
        }
    }

    public static int getMagicNumber(int m) {
        int mn = -1;
        switch (m) {
            case 2:
            case 3:
            case 11:
                mn = 3;
                break;
            case 1:
            case 10:
                mn = 0;
                break;
            case 6:
                mn = -3;
                break;
            case 8:
                mn = 2;
                break;
            case 9:
            case 12:
                mn = -2;
                break;
        }
        return mn;
    }

    public static String getDay(int R) {
        if (R == 0) {
            return "Sunday";
        } else if (R == 1) {
            return "Monday";
        } else if (R == 2) {
            return "Tuesday";
        } else if (R == 3) {
            return "Wednesday";
        } else if (R == 4) {
            return "Thursday";
        } else if (R == 5) {
            return "Friday";
        }
        return "Saturday";
    }

    public String FindDay() {
        int R, td, dy, ly, dd, mn;
        dy = year - 1900;
        ly = (dy - 1) / 4;
        mn = getMagicNumber(month);
        dd = date;
        td = dd + dy + ly + mn;
        if (month > 2 && isLeapYear(year)) {
            td = td + 1;
            R = td % 7;
            return getDay(R);
        } else {
            R = td % 7;
            return getDay(R);
        }
    }

    public static void main(String args[]) {
        MyDay D = new MyDay();
        System.out.println("Your Entered Date " + D.getDate() + "/"
                + D.getMonth() + "/" + D.getYear() + ".That day is " + D.FindDay());
    }
}