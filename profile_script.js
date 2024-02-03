var btn_change_desc = document.getElementById("btn_change_desc");
var block_change_descr = document.getElementById("block_change_descr");
var field_showed = false;
if (btn_change_desc != null && block_change_descr != null) {
    btn_change_desc.onclick = function () {
        field_showed = !field_showed;
        if (field_showed) {
            block_change_descr.innerHTML = "<form action='server.php' method='post'><label for='new_bio'>Write here your new bio:</label><br><textarea cols='50' rows='10' id='new_bio' name='new_bio'></textarea><br><br><input type='submit' class='btn btn-primary' value='Save'></form>";
        }
        else {
            block_change_descr.innerHTML = "";
        }
    };
}
else {
    throw new Error("Button for change description or block for change descryption is not defined. " + btn_change_desc + ", " + block_change_descr);
}
