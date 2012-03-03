<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->options['charset'] ?>" />
<title><?php echo $lang['Qwin Framework'] ?></title>
<?php
$minify->add(array(
    $jQuery->getTheme($this->options['theme']),
    $jQuery->get('jquery, ui, effects, draggable, layout, qui, accordion, tabs, button, metadata, dialog, form, ui.form'),
    $this->getFile('views/style.js'),
    $this->getFile('views/style.css'),
));
?>
</head>
<body>
<style type="text/css">

</style>
<script type="text/javascript">
    qwin.lang = <?php echo json_encode($lang->toArray()) ?>;
</script>
<div class="ui-layout-north">
    <div id="qw-logo" class="ui-widget-content">
        <a href="?">
            <img src="<?php echo $this->getUrlFile('views/images/logo.png') ?>" alt="logo" />
        </a>
    </div>
    <div class="qw-nav" id="qw-nav">
        <a href="javascript:;" class="ui-state-default ui-corner-bl"><?php echo $lang['Welcome']?>, <span id="nav-username">Guest</span>!</a>
        <a id="login" href="javascript:;" class="ui-state-default"><?php echo $lang['Login'] ?></a>
        <a id="logout" href="javascript:;" class="ui-state-default"><?php echo $lang['Logout'] ?></a>
    </div>
</div>
<div class="ui-layout-west">
    <h3 id="qw-menu-title" class="ui-state-default">
        <div id="ui-west-toggler-open" class="ui-state-default">
            <span class="ui-icon ui-icon-carat-1-w"></span>
        </div>
        <!--<a href="javascript:alert('敬请期待!');" id="qw-menu-oper" class="ui-state-default">
            <span class="ui-icon ui-icon-gear"></span>
        </a>-->
        <?php echo $lang['Menus'] ?>
    </h3>
    <div id="qw-menu">
    <?php
    foreach ($menus[0] as $menu) :
    ?>
        <div>
            <h3><a href="<?php echo $menu['url'] ?>"><?php echo $menu['title'] ?></a></h3>
            <div>
            <?php
            if (isset($menus[1][$menu['id']])) :
            ?>
                <ul>
                    <?php
                    foreach ($menus[1][$menu['id']] as $subMenu) :
                    ?>
                    <li>
                        <span class="ui-icon ui-icon-document"></span>
                        <a href="<?php echo $subMenu['url'] ?>"><?php echo $subMenu['title'] ?></a>
                    </li>
                    <?php
                    endforeach;
                    ?>
                </ul>
            <?php
            endif;
            ?>
            </div>
        </div>
    <?php
    endforeach;
    ?>
    </div>
</div>
<div class="ui-layout-center">
    <div id="qw-tabs">
        <ul>
            <li><a href="#ui-tabs-0"><?php echo $title ?></a></li>
        </ul>
        <div id="ui-tabs-0">
            <iframe class="ui-tabs-iframe" src="<?php echo $page ?>" frameBorder="0"></iframe>
        </div>
    </div>
    <a id="qw-fullscreen" title="<?php echo $lang['Full screen'] ?>" class="ui-state-default ui-priority-secondary">
        <span class="ui-icon ui-icon-arrow-4-diag"></span>
    </a>
</div>
<div class="ui-layout-east">

</div>
<div class="ui-layout-south">
    <div id="qw-footer" class="ui-state-default">
        <div id="qw-copyright" class="ui-widget">Powered by Qwin Framework, Version <?php echo Qwin::VERSION ?> Copyright © 2008-2012 Twin. All rights reserved.</div>
    </div>
</div>
</body>
</html>