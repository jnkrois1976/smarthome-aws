<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php if(!$seo_page): ?>
        <meta name="robots" content="noindex,nofollow">
        <?php endif; ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title itemprop='name'><?=$title_tag?></title>
        <link rel="canonical" href="<?php echo base_url();?>" itemprop="url">
        <meta name="description" content="<?=$description?>">
        <meta name="keywords" content="<?=$keywords?>">
        <meta name="author" content="Juan C. Rois">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="format-detection" content="telephone=no" />
        <link rel="alternate" hreflang="en-us" href="alternateURL">
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!--<link rel="stylesheet" href="https://yarnpkg.com/en/package/normalize.css">-->
        <link rel="stylesheet" href="/dist/css/normalize.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="/dist/css/style.css">
    </head>
    <body class="<?=$page_class?>">
        <header>
            <nav>
                <ul>
                    <li>
                        <?php if($page_class !== "register"):?>
                            <a href="/<?=$register_profile_link?>" rel="nofollow"><?=$register_profile?></a>
                            <?php if($this->session->userdata('authenticated') != NULL): ?>
                            <a href="/account/logout" rel="nofollow">Log Out</a>
                            <?php endif; ?>
                        <?php elseif($page_class == "register"):?>
                            <h5>Create an account.</h5>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
            <div>
                <a href="/"><img src="/svg/smarthomehightech_v3.svg" alt="<?=$this->lang->line('site_name')?>" /></a>
            </div>
        </header>
        <main>
