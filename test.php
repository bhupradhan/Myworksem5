<?php
//include 'includes/dbh.inc.php';
require 'includes/dbh.inc.php';
//$db_handle = new dbh.inc();

//$countryResult = $db_handle->runQuery("SELECT DISTINCT Country FROM tbl_user ORDER BY Country ASC");
$sql = "SELECT DISTINCT Country FROM tbl_user ORDER BY Country ASC";
$result = mysqli_query($conn, $sql);
?>
<div class="search-box">
    <select id="Place" name="country[]" multiple="multiple">
        <option value="0" selected="selected">Select Country</option>
        <?php
            if (! empty($countryResult)) {
                 foreach ($countryResult as $key => $value) {
    echo '<option value="' . $countryResult[$key]['Country'] . '">' . $countryResult[$key]['Country'] . '</option>';
                 }
             }
        ?>
    </select>
    <button id="Filter">Search</button>

    <?php

if (! empty($_POST['country'])) {
    ?>
<table cellpadding="10" cellspacing="1">

    <thead>
        <tr>
            <th><strong>Name</strong></th>
            <th><strong>Gender</strong></th>
            <th><strong>Country</strong></th>
        </tr>
    </thead>
    <tbody>
        <?php
    $query = "SELECT * from tbl_user";
    $i = 0;
    $selectedOptionCount = count($_POST['country']);
    $selectedOption = "";
    while ($i < $selectedOptionCount) {
        $selectedOption = $selectedOption . "'" . $_POST['country'][$i] . "'";
        if ($i < $selectedOptionCount - 1) {
            $selectedOption = $selectedOption . ", ";
        }
        
        $i ++;
    }
    $query = $query . " WHERE country in (" . $selectedOption . ")";
    
    //$result = $db_handle->runQuery($query);
    $result = mysqli_query($conn, $query);
}
if (! empty($result)) {
    foreach ($result as $key => $value) {
        ?>
        <tr>
            <td><div class="col" id="user_data_1">
                    <?php echo $result[$key]['Name']; ?>
                </div></td>
            <td><div class="col" id="user_data_2">
                    <?php echo $result[$key]['Gender']; ?>
                </div></td>
            <td><div class="col" id="user_data_3">
                    <?php echo $result[$key]['Country']; ?>
                </div></td>
        </tr>
        <?php
    }
    ?>

    </tbody>
</table>
<?php
    }
?>