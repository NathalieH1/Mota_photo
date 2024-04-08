<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!-- inclusion de l'en-tête de page gràce à la fonction 'include' -->
        <?php include('header.php'); ?>  
    
    <main>
        
    </main>

   
    <?php wp_footer(); ?>
</body>
<?php include('footer.php'); ?>
</html>