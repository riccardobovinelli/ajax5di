<?php
session_start();


class Chat {
   
    public $CLIENT1 = 1;
    public $CLIENT2 = 2;

    private $ver1 = 0;
    private $ver2 = 0;

    private $text1 = "";
    private $text2 = "";
    
    public function __construct() {
        $xmldata = simplexml_load_file("clients.xhtml") or die("Failed to load");
        $this->ver1 = $xmldata->client[0]->ver;
        $this->ver2 = $xmldata->client[1]->ver;
        $this->text1 = $xmldata->client[0]->content;
        $this->text2 = $xmldata->client[1]->content;
    }
    
    private function updateXML(){
       $xmldata = simplexml_load_file("clients.xhtml") or die("Failed to load");
       $xmldata->client[0]->ver = $this->ver1;
       $xmldata->client[1]->ver = $this->ver2;
       $xmldata->client[0]->content = $this->text1;
       $xmldata->client[1]->content = $this->text2;
       file_put_contents("clients.xhtml", $xmldata->saveXML());
    }
    
    public function update($id, $text){
        if($this->CLIENT1 == $id){
            $this->ver1++;
            $this->text1 = $text;
        }else if($this->CLIENT2 == $id){
            $this->ver2++;
            $this->text2 = $text;                
        }
        $this->ver1 = $this->ver1 + 1;
        $this->updateXML();
    }

    public function getText($id){
        if($this->CLIENT1 != $id){
            return $this->text1;
        }else if($this->CLIENT2 != $id){
            return $this->text2;              
        }
    }

    public function getVer($id){
        if($this->CLIENT1 != $id){
            return $this->ver1;
        }else if($this->CLIENT2 != $id){
            return $this->ver2;              
        }
    }

    public function isUptodate($id, $version){
        if($this->CLIENT1 == $id){
            return $version == $this->ver1;
        }else if($this->CLIENT2 == $id){
            return $version == $this->ver2;
        }
    }
}

$chat = new Chat();
if (isset($_POST["update"]) && $_POST["update"]) {
    //echo "entrato";
    $chat->update($_POST["id"], $_POST["text"]);
    //echo "ver=".$this->getVer($id);
    //echo $this->getText($id);
} else if (isset($_POST["polling"]) && $_POST["polling"]):
    $id = $_POST["id"]; //Il client si identifica
    $version = $_POST["ver"];
    echo $chat->isUptodate($id, $version);
else:
    $id = $_POST["id"];
    ?>
    <file>
        <ver><?php echo $chat->getVer($id) ?></ver>
        <content><?php echo $chat->getText($id) ?></content>
    </file>
<?php endif; ?>