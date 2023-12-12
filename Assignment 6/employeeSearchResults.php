<?php

require_once "util/CisUtil.class.php";

$firstName = isset($_GET['firstName']) ? CisUtil::cleanInputs($_GET['firstName']) : '';
$lastName = isset($_GET['lastName']) ? CisUtil::cleanInputs($_GET['lastName']) : '';
$limit = isset($_GET['limit']) ? CisUtil::cleanInputs($_GET['limit']) : 5;
$orderBy = isset($_GET['orderBy']) ? CisUtil::cleanInputs($_GET['orderBy']) : 'employee.emp_id';
$order = isset($_GET['order']) ? CisUtil::cleanInputs($_GET['order']) : 'asc';
//Cleans the inputs.
if (isset($_GET['order'])) {
    switch (strtolower($_GET['order'])) {
        default:
        case "asc":
            $order = "asc";
            break;
        case "desc":
            $order = "desc";
            break;
    }
}

$limit = is_numeric($limit) ? round($limit) : $limit;
$limit = $limit == 0 ? 5 : $limit;

CisUtil::startPage("Employee Search Results");
?>
    <div id="employeeArea" class="mx-auto">
        <h1>Employee Search Results</h1>
        <?php
        require("sql/config.php");
        global $mysqli;

        //Base Query
        /*$query = "SELECT * FROM employee ";*/
        $query = "SELECT EMP_ID as 'Employee ID', FIRST_NAME as 'First Name', LAST_NAME as 'Last Name', START_DATE as 'Start Date' FROM employee ";
        //Get by first name and last name
        if (!empty($firstName) || !empty($lastName)) {
            $query .= "WHERE first_name LIKE '%" . $mysqli->real_escape_string($firstName) . "%' AND last_name LIKE '%" . $mysqli->real_escape_string($lastName) . "%' ";
        }
        //sorting
        $query .= " order by " . $orderBy . " " . $order;
        //Row Limit
        if ((strcasecmp("all", strtolower(trim($limit))) != 0 && strcasecmp("none", strtolower(trim($limit))) != 0)) {
            $query .= " LIMIT " . $limit;
        }


/*        echo $query;
        CisUtil::sendMessageBox($query);*/

        $result = $mysqli->query($query);

        $num_results = $result->num_rows;

        $employees = $result->fetch_all(MYSQLI_ASSOC);

        //This dynamically retieves header names
        if (isset($employees[0]) || count($employees) != 0) {
            echo "<table class='table-bordered'><tr>";
            foreach ($employees[0] as $k => $v) {

                echo "<th>" . CisUtil::displaySqlHead($k) . "</th>";

            }
            echo "</tr></thead>";
            echo "<tbody>";
            //Create a new row for each book
            foreach ($employees as $employee) {
                echo "<tr>";
                $i = 0;

                foreach ($employee as $k => $v) {

                    if ($k == 'id') {
                        echo "<td>" . $v . "</td>";
                        $bookId = $v;
                    } else {
                        echo "<td>" . $v . "</td>";
                    }
                    /*            if (($i == count($book) - 1)) {
                                    echo "<td>";
                                    echo "<div class='btn-toolbar'>";
                                    echo "<a href='editBook.php?bookId=" . $bookId . "' title='Edit Record' class='btn btn-info btn-xs' data-toggle='tooltip'>Edit</a>";
                                    echo "<a href='delete.php?bookId=" . $bookId . "' title='Delete Record' class='btn btn-info btn-xs' data-toggle='tooltip'>Delete</a>";
                                    echo "</div>";
                                    echo "</td>";
                                }
                                $i++;*/
                }
                echo "</tr>";

            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "No results found";
        }
        $result->free();
        $mysqli->close();
        ?>

        <a href="employeeSearch.php" class="mt-3">Go Back</a>

    </div>
    </main>
<?php
/*CisUtil::endPage();
} else {
    Header("location:employeeSearch.php");
}*/