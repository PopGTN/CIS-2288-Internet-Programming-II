<?php
require_once "util/CisUtil.class.php";
CisUtil::startPage("Employee Search");
?>
    <div id="employeeArea" class="mx-auto">
        <h1>Employee Search</h1>
        <form action="employeeSearchResults.php" method="GET">
            <div class="mb-1">
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" id="firstName">
            </div>
            <div class="mb-1">
                <label for="lastName">Last Name:</label>
                <input type="text" name="lastName" id="lastName">
            </div>
            <div class="mb-1">
                <label for="limit">Results Per Page:</label>
                <select name="limit" id="limit">
                    <option value="2">2</option>
                    <option value="5" selected>5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="all">All</option>
                </select>
            </div>
            <div class="mb-1">
                <label for="orderBy">Order By:</label>
                <select name="orderBy" id="orderBy">
                    <option value="emp_id">Employee ID</option>
                    <option value="first_name">First Name</option>
                    <option value="last_name">Last Name</option>
                    <option value="start_date">Start Date</option>
                </select>
            </div>
            <div class="mb-1">
                <label for="order">Order:</label>
                <select name="order" id="order">
                    <option value="asc" selected>Ascending</option>
                    <option value="desc">Descending</option>
                </select>
            </div>
            <div class="mb-1">
                <button type="submit">Search</button>
            </div>
        </form>

    </div>
<?php


