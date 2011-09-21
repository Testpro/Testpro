<?php
header('Content-Type: application/force-download');
header('Content-Disposition: attachment; filename=resume.pdf');   
readfile('resume.pdf');
?> 