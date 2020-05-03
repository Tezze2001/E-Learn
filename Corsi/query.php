<?php
    require_once ('./../Classi/Query.php');
    if (isset($_POST['query']) && isset($_POST['cont']))
    {
        $db = new Query();
        $email = $db->selectInsegnanti($_POST['query']);
        if ($email !="No matches")
        {
            echo '
            <div class="row" id="i'.(string)($_POST['cont']+1).'">
                <div class="col">
                    <input disabled type="text" name="i'.(string)($_POST['cont']+1).'" class="form-control insegnanti" value="'.$email.'">
                </div>
                <div class="col">
                    <img width="16px" height="16px" onclick="cancella(\'i'.(string)($_POST['cont']+1).'\')" src="https://image.flaticon.com/icons/svg/446/446046.svg" alt="cancella">
                </div>
            </div>
            ';
        }
    }
?>