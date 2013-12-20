<?php echo $this->doctype(Zend_View_Helper_Doctype::XHTML1_TRANSITIONAL); ?>
<html>
 <head>
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	 <?php $this->headScript()->headScript()->prependFile($this->baseUrl . 'design/js/functions.js'); ?>
	 <?php echo $this->headTitle('Dropbox'); ?>
	 <?php echo $this->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8'); ?>
	 <?php echo $this->headLink()->appendStylesheet($this->baseUrl . 'design/css/style.css'); ?>
	 <?php echo $this->headScript(); ?>
 </head>
<body>
<div id="content"><?php echo $this->layout()->content; ?></div>
</body>
</html>
