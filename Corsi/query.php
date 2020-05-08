<?php
    require_once ('./../Classi/Query.php');
    $tipologia = array(
        "s" => "studenti",
        "i" => "insegnanti",
    );
    if (isset($_POST['query']) && isset($_POST['cont']) && isset($_POST['tipo']))
    {
        $db = new Query();
        $email = $db->selecUtenti($_POST['query'], $_POST['tipo']);
        if ($email !="No matches")
        {
            echo '
            <div class="row" id="'.$_POST['tipo'].(string)($_POST['cont']).'">
                <div class="col">
                    <input disabled type="text" name="'.$_POST['tipo'].(string)($_POST['cont']).'" class="form-control '.$tipologia[$_POST['tipo']].'" value="'.$email.'">
                </div>
                <div class="col">
                    <img width="16px" height="16px" onclick="cancella(\''.$_POST['tipo'].(string)($_POST['cont']).'\')" src="https://image.flaticon.com/icons/svg/446/446046.svg" alt="cancella">
                </div>
            </div>
            ';
        }
    }
?>