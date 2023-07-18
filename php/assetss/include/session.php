<?php
function Message(){
    if(isset ($_SESSION["ErrorMessage"])){
     
        
           $Output="<div class=\"alert alert-danger alert-danger-style1 alert-st-bg\">";
        $Output.="<button type=\"button\" class=\"close danger-op\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span class=\"icon-sc-cl\" aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <span class=\"adminpro-icon adminpro-checked-pro admin-check-danger admin-check-pro-none\"></span>
                                    
                                <strong>";
        
         $Output.=htmlentities($_SESSION["ErrorMessage"]);
        $Output.="</strong></div>";
        $_SESSION["ErrorMessage"]=null;
        return $Output;
    }
}

function SuccessMessage(){
    if(isset ($_SESSION["SuccessMessage"])){
        $Output="<div class=\"alert alert-success alert-success-style1 alert-st-bg\">";
        $Output.="<button type=\"button\" class=\"close sucess-op\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span class=\"icon-sc-cl\" aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <span class=\"adminpro-icon adminpro-checked-pro admin-check-sucess admin-check-pro-none\"></span>
                                    
                                <strong>";
        
        $Output.=htmlentities($_SESSION["SuccessMessage"]);
        $Output.="</strong></div>";
        $_SESSION["SuccessMessage"]=null;
        return $Output;
    }
}



?>