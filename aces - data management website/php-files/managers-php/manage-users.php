<?php include "../../db-files/db-checks/check-manager-login.php"; ?>
<?php include "../../db-files/db-manage-users.php"; ?>

<!DOCTYPE html>

<html>
    <head>
        <!--Contains all meta data info and neccessary js and css files to repeat on all php pages-->
        <?php include "../../php-files/repeat-php/head-info.php"; ?>
        <title>Manage Users</title>
    </head>

    <body>
        <?php include "../../php-files/repeat-php/manager-header.php"; ?>
        <div class="dummy-header"></div>     

        <div class="main-headings">Manage Users</div>

        <div id="search-area">
        <form method="POST" class="search-form">
        Enter a card ID to delete or update a user
        <br>
        (View Users to find Card ID)
        <br><br>
            <label for="card-id">Enter Card ID:</label>
            <input name="card-id" type="text">

            <input name="submit-delete-user" type="Submit" value="Delete">
            <br>
            <span class="invalid-feedback"><?php echo $card_id_delete_err; ?></span>
            <br>

            <label for="end-date">Enter New End Date:</label>
            <input name="end-date" type="date">
            <label for="role-type-id">Enter New Role Type:</label>
            <select name="role-typed-id" class="search-dropdown">
                <option>CC</option>
                <option>Gu</option>
                <option>Le</option> 
                <option>Ma</option>
                <option>Se</option>
                <option>St</option>                
            </select>
            <input name="submit-edit-user" type="Submit" value="Edit">
            <br>
            <span class="invalid-feedback"><?php echo $card_id_update_err; ?></span>
            <br><br>
            Enter a Person ID, First Name, Surname, Start Date and Role Type ID
            <br>
            (Card ID and Review Date will be automated)
            <br><br>
            <label for="add-user-id">Enter User ID:</label>
            <input name="add-user-id" type="number">

            <label for="add-user-fname">Enter User First Name:</label>
            <input name="add-user-fname" type="text">

            <label for="add-user-sname">Enter User Last Name:</label>
            <input name="add-user-sname" type="text">

            <label for="add-user-date">Enter Start Date:</label>
            <input name="add-user-date" type="date">
            <br>
            <label for="add-user-role">Enter User Role Type:</label>
            <select name="add-user-role" class="search-dropdown">
                <option>CC</option>
                <option>Gu</option>
                <option>Le</option> 
                <option>Ma</option>
                <option>Se</option>
                <option>St</option>                
            </select>
            <input name="submit-add-user" type="Submit" value="Add">
            <br>
            <span class="invalid-feedback"><?php echo $card_add_err; ?></span>
            <br><br>
            <span class="invalid-feedback"><?php echo $message; ?></span>
        </form>
        <div class="dummy-footer"></div>
    </body>
</html>