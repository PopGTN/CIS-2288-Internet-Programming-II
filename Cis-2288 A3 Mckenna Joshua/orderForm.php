<?php

require_once 'util/CisUtil.php';
require_once 'util/FormBuilder.php';

CisUtil::startPage("Acme Accessories Inc.", '
<link href="css/Custom.css" rel="stylesheet">
<style>
thead,
tfoot {
  background-color: #3f87a6;
  color: #fff;
}

tbody {
  background-color: #e4f0f5;
}

caption {
  padding: 10px;
  caption-side: bottom;
}

table {
  border-collapse: collapse;
  border: 2px solid rgb(200, 200, 200);
  letter-spacing: 1px;
  font-family: sans-serif;
  font-size: 0.8rem;
}

td,
th {
  border: 1px solid rgb(190, 190, 190);
  padding: 5px 10px;
}

td {
  text-align: center;
}

</style>
');

CisUtil::navbar();        /*Image Credit
        https://www.apple.com/ca/newsroom/2023/09/apple-unveils-iphone-15-pro-and-iphone-15-pro-max/
        */

?>
</div>
<?php CisUtil::header("Acme Accessories" ) ?>
<main class="container fill-page bg-white">
    <form action="" method="post">
    <table>
        <caption>
            Council budget (in £) 2018
        </caption>
        <thead>
        <tr>
            <th scope="col">Items</th>
            <th scope="col">Expenditure</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>3,000</td>
        </tr>
        <tr>
            <th scope="row">Stationery</th>
            <td>18,000</td>
        </tr>
        </tbody>
    </table>

</main>


<?php

CisUtil::footer();
CisUtil::endPage('<script src="js/BootstrapForm.js"</script>');

?>
