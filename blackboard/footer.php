    <footer>

	  <?php
        wp_nav_menu(array(
          'theme_location'  => 'footer-menu',
          'menu'            => '',
          'container'       => 'div',
          'container_class' => '',
          'container_id'    => '',
          'menu_class'      => 'menu',
          'menu_id'         => '',
          'echo'            => true,
          'fallback_cb'     => 'wp_page_menu',
          'before'          => '',
          'after'           => '',
          'link_before'     => '',
          'link_after'      => '',
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth'           => 0,
          'walker'          => ''
        ));
      ?>

      <p>Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </footer>

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_footer();?>
  </body>
</html>