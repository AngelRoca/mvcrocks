<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8 " />
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- css tags -->
    <?= $this->printCssTags($this->tagscss) ?>

    <!-- documents title -->
	<title><?= $this->config->title ?></title>
</head>

    <body>
        <!-- content of the file -->
        <?php $this->include_module( $this->location, $this->action) ?>

        <!-- javascript tags -->
        <?= $this->printJsTags($this->tagsjs) ?>
    </body>

</html>