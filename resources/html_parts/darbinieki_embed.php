<div class="Fields">
    <button id="add-btn">Pievienot Lietotāju</button>
    <form action="" method="post">
      <div id="add-pop">
          <input name="name" type="text" class="input" minlength="3" maxlength="25" placeholder="Vārds" required>
          <input name="lastname" type="text" class="input" minlength="3" maxlength="25" placeholder="Uzvārds" required>
          <input name="phone" type="tel" minlength="4" maxlength="8" class="input" placeholder="Telefona numurs" required>
          <input name="username" type="text" class="input" minlength="3" maxlength="25" placeholder="Lietotājvārds" required>
          <input name="password" type="password" class="input" minlength="3" maxlength="25" placeholder="Parole" required>
          <input name="admin" type="checkbox" id="html" name="fav_language" value="HTML">
          <label class="txt">Ir Admin</label>
          <input class="btn" name=submit type="submit" value="Pievienot">
          <button id="close-btn">Atcelt</button>
      </div>
    </form>
</div>
<div class="list">
    <div class="tabulaBox">
        <table class="table-sortable" id="trow">
            <thead>
                <th>ID</th>
                <th>Lietotajvārds</th>
                <th>Parole</th>
                <th>Vārds</th>
                <th>Uzvārds</th>
                <th>Tālr_NR</th>
                <th>Admin</th>
                <th>Rediģēt</th>
            </thead>
            <?php
                $query = "SELECT * FROM lietotaji";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result)) {
            ?>
            <tr class="table">
                <td><?php echo $row["Lietotaja_ID"]; ?></td>
                <td name='lala' class='edits' contenteditable="false"><?php echo $row['Lietotajvards']; ?></td>
                <td class='edits' contenteditable="false"><?php echo $row['Parole']; ?></td>
                <td class='edits' contenteditable="false"><?php echo $row['Vards']; ?></td>
                <td class='edits' contenteditable="false"><?php echo $row['Uzvards']; ?></td>
                <td class='edits' contenteditable="false"><?php echo $row['Talr_Nr']; ?></td>
                <td class='edits' contenteditable="false"><?php echo $row['Admin']; ?></td>
                <td><a href="backend/delete.php?Lietotaja_ID=<?php echo $row["Lietotaja_ID"]; ?>"><button id='dzest'>Dzēst</button></a><br><button id='labot'>Labot</button><a><form action='editdata.php' method="post"><input type='Submit' style='display:none' value='Apstiprināt' name='aed' id='acceptbtn'></input></form></a></td>
            </tr>
            <?php
            }
          ?>
        </table>
    </div>
</div>