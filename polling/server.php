<?php
include_once("Chat.php");

if ($_POST["update"]) {
    //echo "entrato";
    Chat::update($_POST["id"], $_POST["text"]);
    //echo "ver=".Chat::getVer($id);
    //echo Chat::getText($id);
} else if (isset($_POST["polling"]) && $_POST["polling"]):
    $id = $_POST["id"]; //Il client si identifica
    $version = $_POST["ver"];
    echo Chat::isUptodate($id, $version);
else:
    ?>
    <file>
        <ver><?php echo Chat::getVer($id) ?></ver>
        <content><?php echo Chat::getText($id) ?></content>
    </file>
<?php endif; ?>