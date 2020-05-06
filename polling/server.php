<?php
    class Chat{
        static public $CLIENT1 = "1";
        static public $CLIENT2 = "2";
        
        static private $ver1 = 0;
        static private $ver2 = 0;
        
        static private $text1 = "";
        static private $text2 = "";
        
        public static function update($id, $text){
            if(Chat::$CLIENT1 == $id){
                Chat::$ver1++;
                Chat::$text1 = $text;
            }else if(Chat::$CLIENT2 == $id){
                Chat::$ver2++;
                Chat::$text2 = $text;                
            }
        }
        
        public static function getText($id){
            if(Chat::$CLIENT1 != $id){
                return Chat::$text1;
            }else if(Chat::$CLIENT2 != $id){
                return Chat::$text2;              
            }
        }
        
        public static function getVer($id){
            if(Chat::$CLIENT1 != $id){
                return Chat::$ver1;
            }else if(Chat::$CLIENT2 != $id){
                return Chat::$ver2;              
            }
        }
        
        public static function isUptodate($id, $version){
            if(Chat::$CLIENT1 == $id){
                return $version == Chat::$ver1;
            }else if(Chat::$CLIENT2 == $id){
                return $version == Chat::$ver2;
            }
        }
    }
    if(isset($_POST["polling"]) && $_POST["polling"]):
        $id = $_POST["id"];//Il client si identifica
        $version = $_POST["ver"];
        echo Chat::isUptodate($id, $version);
    else:?>
<file>
    <ver><?php echo Chat::getVer($id)?></ver>
    <content><?php echo Chat::getText($id)?></content>
</file>
<?php endif;?>